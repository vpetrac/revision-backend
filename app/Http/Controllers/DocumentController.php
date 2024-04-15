<?php

namespace App\Http\Controllers;

use App\Models\ControlList;
use App\Models\FinalAuditReport;
use App\Models\Finding;
use App\Models\Goal;
use App\Models\InfedilityList;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\Revision;
use App\Models\SurveyResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{
    public function generateDocument(Request $request)
    {
        $documentType = $request->input('document_type');
        $revisionId = intval($request->input('revision_id')) ?: -1;
        $reportId = intval($request->input('report_id')) ?: -1;
        $revision = null;
        $report = null;

        if ($revisionId !== -1) {
            $revision = Revision::find($revisionId);

            if (!$revision) {
                return response()->json(['error' => "Revision not found $revisionId"], 404);
            }
        }

        if ($reportId !== -1) {
            $report = Report::find($reportId);

            if (!$report) {
                return response()->json(['error' => 'Report not found'], 404);
            }
        }
        // Prepare the PDF
        $pdf = App::make('dompdf.wrapper');
        $htmlContent = '';

        switch ($documentType) {
            case 'revision_plan_and_program':
                $pdf->setPaper('a4', 'portrait'); // Customize as needed
                $htmlContent = $this->generateRevisionPlanAndProgram($revision);
                break;
            case 'sample_selection':
                $pdf->setPaper('a4', 'landscape'); // Customize as needed
                $htmlContent = $this->generateSampleSelection($revision);
                break;
            case 'preliminary_risk_assessment':
                $pdf->setPaper('a4', 'portrait'); // Customize as needed
                $htmlContent = $this->generatePreliminaryRiskAssessment($revision);
                break;
            case 'testing_program_and_results':
                $pdf->setPaper('a4', 'landscape'); // Customize as needed
                $htmlContent = $this->generateTestingProgramsAndResults($revision);
                break;
            case 'infidelity_declaration':
                $pdf->setPaper('a4', 'portrait'); // Customize as needed
                $htmlContent = $this->generateInfidelityDeclaration($revision);
                break;
            case 'infidelity_declaration_user':
                $pdf->setPaper('a4', 'portrait'); // Customize as needed
                $htmlContent = $this->generateInfidelityDeclarationForUser($revision);
                break;
            case 'recommendations_plan':
                $pdf->setPaper('a4', 'landscape'); // Customize as needed
                $htmlContent = $this->generateRecommendationsPlan($revision);
                break;
            case 'meeting_report':
                $pdf->setPaper('a4', 'portrait'); // Customize as needed
                $htmlContent = $this->generateMeetingReport($report);
                break;
            case 'control_list':
                $pdf->setPaper('a4', 'portrait'); // Customize as needed
                $htmlContent = $this->generateControlList($revision);
                break;
            case 'subject_survey':
                $pdf->setPaper('a4', 'portrait'); // Customize as needed
                $htmlContent = $this->generateSurvey($revision);
                break;
            case 'revision_book':
                $pdf->setPaper('a2', 'landscape'); // Customize as needed
                $htmlContent = $this->generateRevisionBook($revision);
                break;
            case 'draft_report_template':
                $this->generateDraftRevisionReport($revision);
                break;
            case 'final_report_template':
                $pdf->setPaper('a4', 'portrait'); // Customize as needed
                $htmlContent = $this->generateFinalRevisionReport($revision);
                break;
            default:
                return response()->json(['error' => 'Invalid document type provided'], 400);
        }

        // Load the HTML content
        $css = "<style>.page-break { page-break-after: always; }</style>";
        $pdf->loadHTML($css . $htmlContent);

        // Output the PDF as a string
        $output = $pdf->output();

        // Return the PDF as a response
        return response()->make($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $documentType . '_' . time() . '.pdf"',
        ]);
    }

    protected function generateRevisionPlanAndProgram($revision)
    {
        $revisionId = $revision->id;
        $revision->load('goals');
        $revision->load('programs');
        // Generate HTML for the final report
        // Note: Replace 'your_view_here' with the actual view path

        $goalProgram = Goal::whereHas('programs', function ($query) use ($revisionId) {
            $query->where('revision_id', $revisionId);
        })->with(['programs' => function ($query) use ($revisionId) {
            $query->where('revision_id', $revisionId);
        }])->get();


        return view('revision_plan_and_program', compact('revision', 'goalProgram'))->render();
    }

    protected function generateSampleSelection($revision)
    {
        $revision->load('samples');
        return view('sample_selection', compact('revision'))->render();
    }

    protected function generatePreliminaryRiskAssessment($revision)
    {
        $revision->load('programs');
        return view('preliminary_risk_assessment', compact('revision'))->render();
    }

    protected function generateTestingProgramsAndResults($revision)
    {
        $revision->load('programs');
        return view('testing_program_and_results', compact('revision'))->render();
    }

    protected function generateInfidelityDeclaration($revision)
    {
        $infidelityLists = InfedilityList::where('revision_id', $revision->id)->with('user')->get();

        // Define default questions
        $defaultQuestions = [
            'Imate li poslovni, financijski ili obiteljski interes koji može utjecati na reviziju na bilo koji način?',
            'Imate li izravne izvršene zadaće vezane uz revidirani proces ili ustrojstvenu jedinicu koja je uključena u taj proces?',
            'Imate li izravne ili neizravne rukovodne i upravljačke zadaće vezane uz revidirani proces ili ustrojstvenu jedinicu koja je uključena u taj proces?',
            'Jeste li donosili odluke, odobrili nalog za službeni put, račune, naloge za plaćanje za revidirani subjekt u posljednjih godinu dana?',
        ];

        // Prepare default content
        $defaultContent = array_map(function ($question) {
            return ['question' => $question, 'answer' => null];
        }, $defaultQuestions);

        // Decode the JSON string from revision subjects
        $subjects = json_decode($revision->subjects, true);

        // Get all user IDs already in the infidelity lists
        $existingUserIds = $infidelityLists->pluck('user_id')->toArray();

        // Extract user IDs from the decoded subjects
        $requiredUserIds = array_column($subjects, 'value');

        // Create temporary InfidelityList entries for missing users
        foreach ($requiredUserIds as $userId) {
            if (!in_array($userId, $existingUserIds)) {
                $tempUser = \App\Models\User::find($userId);
                if ($tempUser) {
                    $tempInfidelityList = new InfedilityList([
                        'user_id' => $userId,
                        'revision_id' => $revision->id,
                        'content' => $defaultContent
                    ]);
                    $tempInfidelityList->setRelation('user', $tempUser);
                    $infidelityLists->push($tempInfidelityList);
                }
            }
        }

        return view('infidelity_declaration', compact(['revision', 'infidelityLists']))->render();
    }

    protected function generateInfidelityDeclarationForUser($revision)
    {
        $user = Auth::user();

        // Fetch the infidelity list entry for the current user and revision
        $infidelityList = InfedilityList::where('revision_id', $revision->id)
            ->where('user_id', $user->id)
            ->first();

        // Define default questions if no list exists
        if (!$infidelityList) {
            $defaultQuestions = [
                'Imate li poslovni, financijski ili obiteljski interes koji može utjecati na reviziju na bilo koji način?',
                'Imate li izravne izvršene zadaće vezane uz revidirani proces ili ustrojstvenu jedinicu koja je uključena u taj proces?',
                'Imate li izravne ili neizravne rukovodne i upravljačke zadaće vezane uz revidirani proces ili ustrojstvenu jedinicu koja je uključena u taj proces?',
                'Jeste li donosili odluke, odobrili nalog za službeni put, račune, naloge za plaćanje za revidirani subjekt u posljednjih godinu dana?',
            ];

            // Prepare default content
            $defaultContent = array_map(function ($question) {
                return ['question' => $question, 'answer' => 0];
            }, $defaultQuestions);

            // Create a temporary InfidelityList object (not saved to DB)
            $infidelityList = new InfedilityList([
                'revision_id' => $revision->id,
                'user_id' => $user->id,
                'content' => $defaultContent
            ]);
            $infidelityList->setRelation('user', $user);
        }

        // Log the found or created infidelity list
        Log::debug($infidelityList);
        Log::debug($revision);

        // Render the view with the infidelity list and revision
        return view('infidelity_declaration_user', compact(['revision', 'infidelityList']))->render();
    }


    protected function generateRecommendationsPlan($revision)
    {
        $revision->load('recommendations');

        return view('recommendations_plan', compact('revision'))->render();
    }

    protected function generateMeetingReport($report)
    {
        return view('meeting_report', compact('report'))->render();
    }


    protected function generateControlList($revision)
    {
        $controlLists = ControlList::where('revision_id', $revision->id)->get();
        Log::debug($controlLists);
        Log::debug($revision);
        return view('control_list', compact(['revision', 'controlLists']))->render();
    }

    protected function generateSurvey($revision)
    {
        $surveys = SurveyResponse::where('revision_id', $revision->id)->get();
        Log::debug($surveys);
        Log::debug($revision);
        return view('survey', compact(['revision', 'surveys']))->render();
    }

    protected function generateRevisionBook($revision)
    {
        return view('revision_book', compact('revision'))->render();
    }

    protected function generateDraftRevisionReport($revision)
    {
        $report = FinalAuditReport::where('revision_id', $revision->id)->first();
        $revisionId = $revision->id;
        $revision->load('goals');
        $revision->load('programs');
        $revision->load('recommendations');
        $revision->load('samples');

        $findings = Finding::with(['recommendations'])
            ->where('revision_id', $revisionId)
            ->get();


        Log::debug($findings);

        return view('draft_revision_report', compact(['revision', 'report', 'findings']))->render();
    }

    protected function generateFinalRevisionReport($revision)
    {
        $report = FinalAuditReport::where('revision_id', $revision->id)->first();
        $revisionId = $revision->id;
        $revision->load('goals');
        $revision->load('programs');
        $revision->load('recommendations');
        $revision->load('samples');

        $findings = Finding::with(['recommendations'])
            ->where('revision_id', $revisionId)
            ->get();


        Log::debug($findings);

        return view('final_revision_report', compact(['revision', 'report', 'findings']))->render();
    }
    // Add additional methods to generate other document types...
}
