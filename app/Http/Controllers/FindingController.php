<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFindingRequest;
use App\Http\Requests\UpdateFindingRequest;
use App\Models\Finding;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class FindingController extends Controller
{

    /**
     * Display a listing of findings for a specific revision.
     *
     * @param  int  $revisionId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($revisionId)
    {
        $findings = Finding::where('revision_id', $revisionId)->get();
        return response()->json($findings);
    }

    /**
     * Store a newly created finding in storage.
     *
     * @param  \App\Http\Requests\StoreFindingRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreFindingRequest $request)
    {
        $finding = Finding::create($request->validated());
        return response()->json($finding, Response::HTTP_CREATED);
    }

    /**
     * Display the specified finding.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $finding = Finding::find($id);
        if (!$finding) {
            return response()->json(['message' => 'Finding not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($finding);
    }

    /**
     * Update the specified finding in storage.
     *
     * @param  \App\Http\Requests\UpdateFindingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateFindingRequest $request, $id)
    {
        $finding = Finding::find($id);
        if (!$finding) {
            return response()->json(['message' => 'Finding not found'], Response::HTTP_NOT_FOUND);
        }

        $finding->update($request->validated());
        return response()->json($finding);
    }

    /**
     * Remove the specified finding from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $finding = Finding::find($id);
        if (!$finding) {
            return response()->json(['message' => 'Finding not found'], Response::HTTP_NOT_FOUND);
        }

        $finding->delete();
        return response()->json(['message' => 'Finding deleted successfully'], Response::HTTP_OK);
    }

    public function getFindingsRaw(Request $request)
    {
        $revisionIds = $request->query('revisionId', []);
        $statuses = $request->query('status', []);
        $responsibilities = $request->query('responsibility', []);
        $startDate = $request->query('startDate');
        $endDate = $request->query('endDate');

        $query = Finding::query();

        // Apply filtering based on provided revision IDs
        if (!empty($revisionIds)) {
            $query->whereIn('revision_id', $revisionIds);
        }

        // Apply filtering based on provided statuses
        if (!empty($statuses)) {
            $query->whereIn('status', $statuses);
        }

        // Apply filtering based on provided responsibilities
        if (!empty($responsibilities)) {
            $query->whereIn('responsibility', $responsibilities);
        }

        $findings = $query->get();

        // Further filter findings by date range
        $filteredFindings = $findings->filter(function ($finding) use ($startDate, $endDate) {

            if (!$startDate && !$endDate) {
                return true;
            }

            if (is_null($finding->deadline) && ($startDate || $endDate)) {
                return false;
            }

            $deadline = $finding->deadline;

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

                    return true; // The finding's last deadline falls within the range
                }
            }

            return false; // Exclude findings without valid deadlines
        });

        $filteredFindings = $filteredFindings->values()->all(); // Assuming $filteredFindings is already a collection of filtered findings.

        usort($filteredFindings, function ($a, $b) {
            $aDeadline = data_get($a, 'deadline', []);
            $bDeadline = data_get($b, 'deadline', []);

            $aLastDeadlineDate = !empty($aDeadline) ? end($aDeadline)['date'] : null;
            $bLastDeadlineDate = !empty($bDeadline) ? end($bDeadline)['date'] : null;

            if (is_null($aLastDeadlineDate)) return -1; // Consider findings with no deadlines as 'smaller'
            if (is_null($bLastDeadlineDate)) return 1; // Consider findings with no deadlines as 'smaller'

            $aDate = Carbon::createFromFormat('Y-m-d H:i:s', $aLastDeadlineDate);
            $bDate = Carbon::createFromFormat('Y-m-d H:i:s', $bLastDeadlineDate);

            return $aDate <=> $bDate; // Use spaceship operator for comparison
        });

        // Load ImplementationActivity for each Finding
        foreach ($filteredFindings as $finding) {
            $finding->load('implementationActivities');
            $finding->load('revision');
        }

        return $filteredFindings;
    }

    public function getFindings(Request $request)
    {

        $filteredFindings = self::getFindingsRaw($request);


        return response()->json($filteredFindings);
    }


    public function generateFindingsReport(Request $request)
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

        $findings = self::getFindingsRaw($request);

        foreach ($findings as &$finding) {
            if (isset($finding->responsibility) && isset($responsibilitiesList[$finding->responsibility])) {
                $finding->responsibility = $responsibilitiesList[$finding->responsibility];
            }
        }
        unset($finding); // Unset the reference to the last element

        $pdf = PDF::loadView('findings', compact('findings'));
        $fileName = 'findings_report_' . time() . '.pdf';
        $pdf->setPaper('a4', 'landscape');
        
        $pdf->save(storage_path('app/public/uploads/' . $fileName)); // Save to storage

        $url = Storage::url($fileName); // Generate a URL to the file

        return response()->json(['url' => $url]); // Return the URL in the response
    }
}
