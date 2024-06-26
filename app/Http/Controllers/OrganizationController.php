<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFindingRequest;
use App\Http\Requests\UpdateFindingRequest;
use App\Models\Finding;
use Illuminate\Http\Response;

class FindingController extends Controller
{
    /**
     * Display a listing of findings for a specific revision.
     */
    public function index($revisionId)
    {
        $findings = Finding::where('revision_id', $revisionId)->get();
        return response()->json($findings);
    }

    /**
     * Store a newly created finding in storage.
     */
    public function store(StoreFindingRequest $request)
    {
        $finding = Finding::create($request->validated());
        return response()->json($finding, Response::HTTP_CREATED);
    }

    /**
     * Display the specified finding.
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
}
