<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Models\Revision;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\File; // Add this at the top for file operations

class DocumentController extends Controller
{
    public function generateDocument(Request $request)
    {
        $documentType = $request->input('document_type');
        $revisionId = $request->input('revision_id');

        $revision = Revision::find($revisionId);

        if (!$revision) {
            return response()->json(['error' => 'Revision not found'], 404);
        }

        $htmlContent = '';

        switch ($documentType) {
            case 'revision_plan_and_program':
                $htmlContent = $this->generateRevisionPlanAndProgram($revision);
                break;
            case 'sample_selection':
                $htmlContent = $this->generateSampleSelection($revision);
                break;
            case 'preliminary_risk_assessment':
                $htmlContent = $this->generatePreliminaryRiskAssessment($revision);
                break;
            case 'testing_program_and_results':
                $htmlContent = $this->generateTestingProgramsAndResults($revision);
                break;
            default:
                return response()->json(['error' => 'Invalid document type provided'], 400);
        }

        // Temporarily save the file to a unique temporary path
        $tempPath = storage_path('app/public/temp/' . uniqid() . '.pdf');

        // Ensure the temporary directory exists
        if (!File::exists(dirname($tempPath))) {
            File::makeDirectory(dirname($tempPath), 0755, true);
        }

        // Generate PDF and save to the temporary path
        Browsershot::html($htmlContent)
            ->format('A4')
            ->showBackground()
            ->save($tempPath);

        // Read the file's content
        $pdfContent = File::get($tempPath);

        // Prepare headers for the response to display PDF inline
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $request->input('document_type') . '_' . time() . '.pdf"',
        ];

        // Clean up: Delete the temporary file
        File::delete($tempPath);

        // Return the PDF content as a response
        return response()->make($pdfContent, 200, $headers);
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
