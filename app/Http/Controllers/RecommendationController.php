<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecommendationRequest;
use App\Http\Requests\UpdateRecommendationRequest;
use App\Models\Recommendation;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class RecommendationController extends Controller
{

    /**
     * Display a listing of recommendations for a specific revision.
     *
     * @param  int  $revisionId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($findingId)
    {
        $recommendations = Recommendation::where('finding_id', $findingId)->get();
        return response()->json($recommendations);
    }

    /**
     * Store a newly created recommendation in storage.
     *
     * @param  \App\Http\Requests\StoreRecommendationRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRecommendationRequest $request)
    {
        $recommendation = Recommendation::create($request->validated());
        return response()->json($recommendation, Response::HTTP_CREATED);
    }

    /**
     * Display the specified recommendation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $recommendation = Recommendation::find($id);
        if (!$recommendation) {
            return response()->json(['message' => 'Recommendation not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($recommendation);
    }

    /**
     * Update the specified recommendation in storage.
     *
     * @param  \App\Http\Requests\UpdateRecommendationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRecommendationRequest $request, $id)
    {
        $recommendation = Recommendation::find($id);
        if (!$recommendation) {
            return response()->json(['message' => 'Recommendation not found'], Response::HTTP_NOT_FOUND);
        }

        $recommendation->update($request->validated());
        return response()->json($recommendation);
    }

    /**
     * Remove the specified recommendation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $recommendation = Recommendation::find($id);
        if (!$recommendation) {
            return response()->json(['message' => 'Reccomendation not found'], Response::HTTP_NOT_FOUND);
        }

        $recommendation->delete();
        return response()->json(['message' => 'Reccomendation deleted successfully'], Response::HTTP_OK);
    }

    public function getRecommendationsRaw(Request $request)
    {
        $revisionIds = $request->query('revisionId', []);
        $importances = $request->query('importances', []);
        $statuses = $request->query('status', []);
        $responsibilitiesQuery = $request->query('responsibility', []);
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');

        $query = Recommendation::query();

        // Apply filtering based on provided revision IDs
        if (!empty($revisionIds)) {
            $query->whereIn('revision_id', $revisionIds);
        }

        $query->where('isFinal', 1);

        if (!empty($importances)) {
            $query->whereIn('importance', $importances);
        }

        // Apply filtering based on provided statuses
        if (!empty($statuses)) {
            $query->whereIn('status', $statuses);
        }

        $recommendations = $query->get();

        // Only apply manual filtering if $responsibilitiesQuery is not empty
        if (!empty($responsibilitiesQuery)) {
            $filteredRecommendations = $recommendations->filter(function ($recommendation) use ($responsibilitiesQuery) {
                // Decode the JSON string into an array
                $responsibilities = json_decode($recommendation->responsibility, true);

                // Check if any of the responsibilities in the current recommendation matches any in $responsibilitiesQuery
                foreach ($responsibilities as $responsibility) {
                    if (in_array($responsibility['value'], $responsibilitiesQuery)) {
                        return true; // Keep this recommendation in the collection
                    }
                }

                return false; // Exclude this recommendation from the collection
            });
        } else {
            $filteredRecommendations = $recommendations; // No filtering needed, keep all recommendations
        }

        // If you need the filtered results to be reindexed
        $filteredRecommendations = $filteredRecommendations->values();

        // Further filter recommendations by date range
        $filteredRecommendations = $filteredRecommendations->filter(function ($recommendation) use ($startDate, $endDate) {

            if (!$startDate && !$endDate) {
                return true;
            }

            if (is_null($recommendation->deadline) && ($startDate || $endDate)) {
                return false;
            }

            $deadline = $recommendation->deadline;

            if (is_string($deadline)) {
                $deadline = json_decode($deadline, true);
            }

            if (!empty($deadline) && is_array($deadline)) {
                $lastDeadline = end($deadline);
                $lastDeadlineDate = $lastDeadline['date'] ?? null;


                if ($lastDeadlineDate) {
                    $deadlineDate = Carbon::createFromFormat('Y-m-d H:i:s', $lastDeadlineDate);

                    // Ensure start and end dates cover the full day
                    $start = $startDate ? Carbon::createFromFormat('Y-m-d', $startDate)->startOfDay() : null;
                    $end = $endDate ? Carbon::createFromFormat('Y-m-d', $endDate)->endOfDay() : null;

                    if ($start && $deadlineDate->lt($start)) {
                        return false;
                    }

                    if ($end && $deadlineDate->gt($end)) {
                        return false;
                    }

                    return true; // The recommendation's last deadline falls within the range
                }
            }

            return false; // Exclude recommendations without valid deadlines
        });

        $filteredRecommendations = $filteredRecommendations->values()->all(); // Assuming $filteredRecommendations is already a collection of filtered recommendations.

        usort($filteredRecommendations, function ($a, $b) {
            $aDeadline = data_get($a, 'deadline', []);
            $bDeadline = data_get($b, 'deadline', []);

            $aLastDeadlineDate = !empty($aDeadline) ? end($aDeadline)['date'] : null;
            $bLastDeadlineDate = !empty($bDeadline) ? end($bDeadline)['date'] : null;

            if (is_null($aLastDeadlineDate)) return 1; // Consider recommendations with no deadlines as 'smaller'
            if (is_null($bLastDeadlineDate)) return -1; // Consider recommendations with no deadlines as 'smaller'

            $aDate = Carbon::createFromFormat('Y-m-d H:i:s', $aLastDeadlineDate);
            $bDate = Carbon::createFromFormat('Y-m-d H:i:s', $bLastDeadlineDate);

            return $bDate <=> $aDate; // Use spaceship operator for comparison
        });

        // Manually filter recommendations by responsibilities
        if (!empty($responsibilitiesQuery)) {
            $responsibilitiesQuery = array_map('strval', $responsibilitiesQuery); // Ensure all values are strings for comparison
            $recommendations = $recommendations->filter(function ($recommendation) use ($responsibilitiesQuery) {
                $responsibilities = json_decode($recommendation->responsibility, true);
                if (!is_array($responsibilities)) return false;

                foreach ($responsibilities as $responsibility) {
                    if (in_array($responsibility['value'], $responsibilitiesQuery)) {
                        return true;
                    }
                }
                return false;
            });
        }

        // Load ImplementationActivity for each Recommendation
        foreach ($filteredRecommendations as $recommendation) {
            $recommendation->load('implementationActivities');
            $recommendation->load('revision');
        }

        return $filteredRecommendations;
    }

    public function getRecommendations(Request $request)
    {

        $filteredRecommendations = self::getRecommendationsRaw($request);


        return response()->json($filteredRecommendations);
    }


    public function generateRecommendationsReport(Request $request)
    {
        $responsibilitiesList = [
            '1' => 'Ured uprave',
            '2' => 'Samostalna služba unutarnje revizije',
            '3' => 'Služba pravnih poslova',
            '4' => 'Služba ljudskih potencijala',
            '5' => 'Služba za praćenje usklađenosti poslovanja, rizika i procesa',
            '6' => 'Samostalna služba unutarnje kontrole',
            '7' => 'Sektor prodaje',
            '8' => 'Služba za podršku prodajnoj mreži',
            '9' => 'Služba za CIAK',
            '10' => 'Odjel podrške prodajnoj mreži',
            '11' => 'Odjel tehničke podrške prodajnoj mreži',
            '12' => 'AK',
            '13' => 'Casino',
            '14' => 'Služba za razvoj prodajne mreže i kanala prodaje',
            '15' => 'Regije',
            '16' => 'Prodajna mjesta',
            '17' => 'Odjel za razvoj prodajne mreže i kanala prodaje',
            '18' => 'Odjel za upravljanje prodajnom mrežom i kanalima prodaje',
            '19' => 'Sektor pripreme i razvoja igara',
            '20' => 'Služba klađenja i casino igara',
            '21' => 'Bookmakerski odjel',
            '22' => 'Odjel podrške klađenju',
            '23' => 'Odjel razvoja kladioničkih produkata',
            '24' => 'Odjel Internet casina',
            '25' => 'Služba lutrijskih igara',
            '26' => 'Odjel lutrijskih igara',
            '27' => 'Odjel organizacije izvlačenja',
            '28' => 'Služba integracije i analitike',
            '29' => 'Služba razvoja softvera',
            '30' => 'Sektor razvoja poslovanja i marketinga',
            '31' => 'Služba za korporativni marketing',
            '32' => 'Odjel za marketing',
            '33' => 'Odjel za dizajn i produkciju',
            '34' => 'Služba za tržišno komuniciranje',
            '35' => 'Odjel za medijsko planiranje i oglašavanje',
            '36' => 'Odjel za marketing prodajne mreže i poslovnih partnera',
            '37' => 'Odjel za odnose s javnošću i komunikacije',
            '38' => 'Služba za promocije, evente i projekte',
            '39' => 'Odjel za promocije',
            '40' => 'Odjel za evente i projekte',
            '41' => 'Služba za marketinšku analitiku',
            '42' => 'Služba za internet i društvene mreže',
            '43' => 'Odjel za društvene mreže',
            '44' => 'Odjel za internet',
            '45' => 'Odjel za razvoj i testiranje',
            '46' => 'Služba za podršku igračima i korisnicima',
            '47' => 'Sektor financija, računovodstva i kontrolinga',
            '48' => 'Služba financija',
            '49' => 'Odjel obračuna plaća',
            '50' => 'Odjl financija',
            '51' => 'Služba računovodstva',
            '52' => 'Odjel financijskog računovodstva',
            '53' => 'Odjel materijalnog računovodstva',
            '54' => 'Služba kontrolinga',
            '55' => 'Sektor logistike',
            '56' => 'Služba nabave',
            '57' => 'Služba upravljanja nekretninama',
            '58' => 'Služba upravljanja skladištem i opskrbom',
            '59' => 'Služba informatike',
            '60' => 'Odjel sistemsko tehničkih poslova i podrške',
            '61' => 'Služba korporativne sigurnosti i zaštite na radu',
            '62' => 'Služba općih poslova',
        ];

        $recommendationsRaw = self::getRecommendationsRaw($request);
        $recommendationsCollection = collect($recommendationsRaw);
        $recommendationsGroupedByRevision = $recommendationsCollection->groupBy('revision_id');

        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper('a4', 'landscape');

        $htmlContent = '';

        // Get the count of groups to manage page breaks correctly
        $groupsCount = $recommendationsGroupedByRevision->count();
        $currentIndex = 0;

        foreach ($recommendationsGroupedByRevision as $revisionId => $recommendations) {
            foreach ($recommendations as &$recommendation) {
                if (isset($recommendation->responsibility) && isset($responsibilitiesList[$recommendation->responsibility])) {
                    $recommendation->responsibility = $responsibilitiesList[$recommendation->responsibility];
                }
            }
            unset($recommendation); // Unset the reference to the last element

            $viewContent = view('recommendations', compact('recommendations'))->render();
            $htmlContent .= $viewContent;

            // Increment the current index after adding content
            $currentIndex++;

            // Add a page break after each group, except for the last one
            if ($currentIndex < $groupsCount) {
                $htmlContent .= '<div class="page-break"></div>';
            }
        }

        $css = "<style>.page-break { page-break-after: always; }</style>";
        $pdf->loadHTML($css . $htmlContent);

        // Output the PDF as a string
        $output = $pdf->output();

        // Return the PDF as a response
        return response()->make($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="baza_preporuka_' . time() . '.pdf"',
        ]);
    }

    /**
     * Duplicate all recommendations and their related implementation activities for a specified revision.
     *
     * @param  int  $revisionId
     * @return \Illuminate\Http\JsonResponse
     */
    public function duplicateForRevision($revisionId)
    {
        // Fetch all recommendations related to the given revision ID
        $recommendations = Recommendation::where('revision_id', $revisionId)->get();

        if ($recommendations->isEmpty()) {
            return response()->json(['message' => 'No recommendations found for this revision'], Response::HTTP_NOT_FOUND);
        }

        // Iterate over the recommendations to duplicate them along with their implementation activities
        foreach ($recommendations as $recommendation) {
            // Duplicate the recommendation
            $newRecommendation = $recommendation->replicate();
            $newRecommendation->isFinal = true; // Set isFinal to true for the duplicate
            $newRecommendation->save(); // Save the new recommendation

            // Duplicate related implementation activities
            foreach ($recommendation->implementationActivities as $activity) {
                $newActivity = $activity->replicate();
                $newActivity->recommendation_id = $newRecommendation->id; // Link to the new recommendation
                $newActivity->save(); // Save the new activity
            }
        }

        return response()->json(['message' => 'Recommendations and related activities duplicated successfully'], Response::HTTP_OK);
    }
}
