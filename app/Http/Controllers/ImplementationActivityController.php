<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImplementationActivityRequest;
use App\Http\Requests\UpdateImplementationActivityRequest;
use App\Models\ImplementationActivity;
use Illuminate\Http\Response;

class ImplementationActivityController extends Controller
{
    /**
     * Display a listing of the resource related to a specific recommendation.
     *
     * @param  int  $recommendationId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($recommendationId)
    {
        // Use with('user') to eagerly load the user relationship
        $activities = ImplementationActivity::with('user')
            ->where('recommendation_id', $recommendationId)
            ->get();

        return response()->json($activities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreImplementationActivityRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreImplementationActivityRequest $request)
    {
        $activity = ImplementationActivity::create($request->validated());
        return response()->json($activity, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        $activity = ImplementationActivity::find($id);

        if (!$activity) {
            return response()->json(['message' => 'Implementation Activity not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateImplementationActivityRequest  $request
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateImplementationActivityRequest $request, string $id)
    {
        $activity = ImplementationActivity::find($id);

        if (!$activity) {
            return response()->json(['message' => 'Implementation Activity not found'], Response::HTTP_NOT_FOUND);
        }

        $activity->update($request->validated());
        return response()->json($activity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $activity = ImplementationActivity::find($id);

        if (!$activity) {
            return response()->json(['message' => 'Implementation Activity not found'], Response::HTTP_NOT_FOUND);
        }

        $activity->delete();
        return response()->json(['message' => 'Implementation Activity deleted successfully'], Response::HTTP_OK);
    }
}
