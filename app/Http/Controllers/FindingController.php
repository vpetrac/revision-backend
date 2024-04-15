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
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        if ($user->hasRole('Subjekt')) {
            $organizationId = $user->organizational_unit_id; // Get the user's organization ID

            // Get findings that have a recommendation with a matching responsibility entry
            $findings = Finding::where('revision_id', $revisionId)
                ->whereHas('recommendations', function ($query) use ($organizationId) {
                    $query->whereJsonContains('responsibility', ['value' => $organizationId]);
                })->get();
        } else {
            // If user does not have 'Subjekt' role, fetch all findings for the revision
            $findings = Finding::where('revision_id', $revisionId)->get();
        }

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
}
