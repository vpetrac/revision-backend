<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDraftAuditReportRequest;
use App\Http\Requests\UpdateDraftAuditReportRequest;
use App\Models\DraftAuditReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DraftAuditReportController extends Controller
{
    /**
     * Display the listing of the resource.
     */
    public function index(Request $request, $revisionId)
    {
        $draftAuditReport = DraftAuditReport::where('revision_id', $revisionId)->first();
        Log::info($draftAuditReport);
        if (!$draftAuditReport) {
            return response()->json(['message' => 'Draft audit report not found for the provided revision ID.'], 404);
        }

        return response()->json($draftAuditReport);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDraftAuditReportRequest $request)
    {
        $draftAuditReport = DraftAuditReport::create($request->validated());
        return response()->json(['message' => 'Draft audit report created successfully.', 'data' => $draftAuditReport], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $draftAuditReport = DraftAuditReport::findOrFail($id);
        return response()->json(['message' => 'Draft audit report retrieved successfully.', 'data' => $draftAuditReport]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDraftAuditReportRequest $request, string $id)
    {
        $draftAuditReport = DraftAuditReport::findOrFail($id);
        $draftAuditReport->update($request->validated());

        return response()->json(['message' => 'Draft audit report updated successfully.', 'data' => $draftAuditReport]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $draftAuditReport = DraftAuditReport::findOrFail($id);
        $draftAuditReport->delete();

        return response()->json(['message' => 'Draft audit report deleted successfully.'], 204);
    }
}
