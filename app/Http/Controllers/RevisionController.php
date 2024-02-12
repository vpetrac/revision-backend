<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRevisionRequest;
use App\Http\Requests\UpdateRevisionRequest;
use App\Models\Revision;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $revisions = Revision::all();
        return response()->json($revisions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRevisionRequest  $request
     * @return JsonResponse
     */
    public function store(StoreRevisionRequest $request): JsonResponse
    {
        $revision = Revision::create($request->validated());
        return response()->json($revision, 201); // HTTP 201 Created
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $revision = Revision::findOrFail($id);
        return response()->json($revision);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRevisionRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(UpdateRevisionRequest $request, $id): JsonResponse
    {
        $revision = Revision::findOrFail($id);
        $revision->update($request->validated());
        return response()->json($revision);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $revision = Revision::findOrFail($id);
        $revision->delete();
        return response()->json(null, 204); // HTTP 204 No Content
    }
}
