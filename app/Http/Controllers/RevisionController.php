<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRevisionRequest;
use App\Http\Requests\UpdateRevisionRequest;
use App\Http\Resources\RevisionResource;
use App\Models\Goal;
use App\Models\Revision;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


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
        $validated = $request->validated();
        $revision = Revision::create($validated);

        if (!empty($validated['revision_goals'])) {
            $goals = json_decode($validated['revision_goals'], true);
            foreach ($goals as $goal) {
                $revision->goals()->create(['name' => $goal['name']]);
            }
        }


        // Magic starts here - Creating a directory named after the revision
        $baseDir = $revision->name;
        Storage::makeDirectory($baseDir);

        // Creating three subdirectories for the revision

        Storage::makeDirectory("{$baseDir}/Faza planiranja");
        Storage::makeDirectory("{$baseDir}/Faza testiranja");
        Storage::makeDirectory("{$baseDir}/Faza izvještavanja");


        return response()->json($revision, 201); // HTTP 201 Created
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $revision = Revision::with('goals')->findOrFail($id);
        return response()->json((new RevisionResource($revision))->resolve());
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
        $revision = Revision::with('goals')->findOrFail($id);

        $oldName = $revision->name;
        $newName = $request->validated()['name'] ?? $oldName; // Assuming 'name' is a field in your request

        $validated = $request->validated();

        // Update the Revision with validated data except for revision_goals
        $revision->update(Arr::except($validated, ['revision_goals']));

        // Handle revision_goals if provided
        if (isset($validated['revision_goals'])) {
            // Assuming revision_goals is already validated as an array of objects
            $goalsData = $validated['revision_goals'];

            // Track IDs of existing goals to identify which ones to remove later
            $existingGoalIds = $revision->goals->pluck('id')->toArray();
            $updatedGoalIds = [];

            foreach ($goalsData as $goalData) {
                $goal = $revision->goals()->updateOrCreate(
                    [
                        'id' => $goalData['id'] ?? null
                    ],
                    [
                        'name' => $goalData['name'],
                        'revision_id' => $revision->id // Ensure the foreign key is correctly set
                    ]
                );
                $updatedGoalIds[] = $goal->id;
            }

            // Remove goals that are no longer present in the update
            $goalsToRemove = array_diff($existingGoalIds, $updatedGoalIds);
            if (!empty($goalsToRemove)) {
                Goal::whereIn('id', $goalsToRemove)->delete();
            }
        }

        // Directory names based on the old and new revision names
        $oldDir = $oldName;
        $newDir = $newName;

        // If the revision name has changed, and the old directory exists, rename it
        if ($oldName !== $newName && Storage::exists($oldDir)) {
            Storage::move($oldDir, $newDir);
        }

        // Regardless of the name change, ensure the three subdirectories exist

        $subDir = "{$newDir}/Faza planiranja";
        if (!Storage::exists($subDir)) {
            Storage::makeDirectory($subDir);
        }
        $subDir = "{$newDir}/Faza testiranja";
        if (!Storage::exists($subDir)) {
            Storage::makeDirectory($subDir);
        }
        $subDir = "{$newDir}/Faza izvještavanja";
        if (!Storage::exists($subDir)) {
            Storage::makeDirectory($subDir);
        }


        return response()->json(new RevisionResource($revision));
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

    /**
     * Get the revision plans from the latest available revision for a given revision ID.
     * If the given revision is the latest, the function returns the plans from the previous revision.
     *
     * @param int $revisionId The ID of the revision.
     * @return \Illuminate\Http\JsonResponse The revision plans.
     */
    public function getLatestRevisionPlans($revisionId)
    {
        // First, get the current revision to find its planned start date
        $currentRevision = Revision::find($revisionId);

        if (!$currentRevision) {
            // If the provided revision ID does not exist
            return response()->json(['message' => 'The provided revision does not exist.'], 404);
        }

        // Fetch the latest revision that started before the current one
        $previousRevision = Revision::where('planned_start_of_internal_revision', '<', $currentRevision->planned_start_of_internal_revision)
            ->orderBy('planned_start_of_internal_revision', 'desc')
            ->first();

        if ($previousRevision) {
            // If there's a previous revision, return its plans
            return response()->json(['revision_plans' => $previousRevision->revision_plans]);
        } else {
            // If no previous revision is found
            return response()->json(['message' => 'No previous revision found to fetch plans from.'], 404);
        }
    }
}
