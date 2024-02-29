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
        // First, find out if the provided ID is for the latest revision
        $latestRevision = Revision::latest('id')->first();

        if (!$latestRevision) {
            // If there are no revisions, return a response indicating there's no data
            return response()->json(['message' => 'No revisions found.'], 404);
        }

        if ($latestRevision->id == $revisionId) {
            // If the provided ID is for the latest revision, get the one before it
            $revision = Revision::where('id', '<', $revisionId)->latest('id')->first();
        } else {
            // If it's not the latest, simply use the provided ID to get the revision
            $revision = Revision::find($revisionId);
        }

        // Check if we found a suitable revision and return its plans
        if ($revision) {
            return response()->json(['revision_plans' => $revision->revision_plans]);
        } else {
            // In case no suitable revision was found (including when there's only one revision and it's the latest)
            return response()->json(['message' => 'No previous revision found to fetch plans from.'], 404);
        }
    }
}
