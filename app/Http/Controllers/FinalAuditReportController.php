<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFinalAuditReportRequest;
use App\Http\Requests\UpdateFinalAuditReportRequest;
use App\Models\FinalAuditReport;
use Illuminate\Http\Request;

class FinalAuditReportController extends Controller
{
    /**
     * Display the listing of the resource.
     */
    public function index(Request $request, $revisionId)
    {
        $finalAuditReport = FinalAuditReport::where('revision_id', $revisionId)->first();

        if (!$finalAuditReport) {
            return response()->json(['message' => 'Final audit report not found for the provided revision ID.'], 404);
        }

        return response()->json($finalAuditReport);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinalAuditReportRequest $request)
    {
        $finalAuditReport = FinalAuditReport::create($request->validated());
        return response()->json(['message' => 'Final audit report created successfully.', 'data' => $finalAuditReport], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $finalAuditReport = FinalAuditReport::findOrFail($id);
        return response()->json(['message' => 'Final audit report retrieved successfully.', 'data' => $finalAuditReport]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinalAuditReportRequest $request, string $id)
    {
        $finalAuditReport = FinalAuditReport::findOrFail($id);
        $finalAuditReport->update($request->validated());

        return response()->json(['message' => 'Final audit report updated successfully.', 'data' => $finalAuditReport]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $finalAuditReport = FinalAuditReport::findOrFail($id);
        $finalAuditReport->delete();

        return response()->json(['message' => 'Final audit report deleted successfully.'], 204);
    }
}
