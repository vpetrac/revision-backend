<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSampleRequest;
use App\Http\Requests\UpdateSampleRequest;
use App\Models\Sample;
use Illuminate\Http\JsonResponse;

class SampleController extends Controller
{
    public function index($revisionId): JsonResponse
    {
        // If 'revision_id' is provided, return samples for that revision; otherwise, return all samples
        $samples = $revisionId ? Sample::where('revision_id', $revisionId)->get() : Sample::all();

        return response()->json($samples);
    }

    public function store(StoreSampleRequest $request): JsonResponse
    {
        $sample = Sample::create($request->validated());
        return response()->json($sample, 201); // HTTP 201 Created
    }

    public function show($id): JsonResponse
    {
        $sample = Sample::findOrFail($id);
        return response()->json($sample);
    }

    public function update(UpdateSampleRequest $request, $id): JsonResponse
    {
        $sample = Sample::findOrFail($id);
        $sample->update($request->validated());
        return response()->json($sample);
    }

    public function destroy($id): JsonResponse
    {
        $sample = Sample::findOrFail($id);
        $sample->delete();
        return response()->json(null, 204); // HTTP 204 No Content
    }
}
