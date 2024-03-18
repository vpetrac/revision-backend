<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Models\Revision;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;

class DocumentController extends Controller
{
    public function generateDocument(Request $request)
    {
        $documentType = $request->input('document_type');
        $revisionId = $request->input('revision_id');

        // Fetch the Revision model
        $revision = Revision::find($revisionId);


        if (!$revision) {
            return response()->json(['error' => 'Revision not found'], 404);
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

    // Add additional methods to generate other document types...
}