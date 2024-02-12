<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\Models\Program;
use Illuminate\Http\JsonResponse;

class ProgramController extends Controller
{
    public function index($revisionId): JsonResponse
    {
        // If 'revision_id' is provided, return programs for that revision; otherwise, return all programs
        $programs = $revisionId ? Program::where('revision_id', $revisionId)->get() : Program::all();

        return response()->json($programs);
    }

    public function store(StoreProgramRequest $request): JsonResponse
    {
        $program = Program::create($request->validated());
        return response()->json($program, 201); // HTTP 201 Created
    }

    public function show($id): JsonResponse
    {
        $program = Program::findOrFail($id);
        return response()->json($program);
    }

    public function update(UpdateProgramRequest $request, $id): JsonResponse
    {
        $program = Program::findOrFail($id);
        $program->update($request->validated());
        return response()->json($program);
    }

    public function destroy($id): JsonResponse
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return response()->json(null, 204); // HTTP 204 No Content
    }
}
