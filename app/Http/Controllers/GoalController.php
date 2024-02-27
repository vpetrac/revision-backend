<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoalController extends Controller
{
    public function attachProgramsToGoal(Request $request)
    {
        $goalsData = $request->input('revision_goal_plans');
        $errors = [];

        foreach ($goalsData as $goalData) {
            $goal = Goal::find($goalData['id']);

            if (!$goal) {
                $errors[] = "Goal with ID {$goalData['id']} does not exist.";
                continue;
            }

            foreach ($goalData['revision_plans'] as $programData) {
                $program = Program::find($programData['id']);

                if (!$program) {
                    $errors[] = "Program with ID {$programData['id']} does not exist.";
                    continue;
                }

                $goal->programs()->syncWithoutDetaching($program);
            }
        }

        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }

        return response()->json(['message' => 'Programs attached to goals successfully.']);
    }

    public function syncProgramsToGoal(Request $request)
    {
        $goalsData = $request->input('revision_goal_plans');
        $errors = [];
        $goalsWithPrograms = [];

        foreach ($goalsData as $goalData) {
            $goal = Goal::find($goalData['id']);

            if (!$goal) {
                $errors[] = "Goal with ID {$goalData['id']} does not exist.";
                continue;
            }

            $programIdsToAttach = collect($goalData['revision_plans'])->pluck('id')->filter(function ($id) {
                return Program::find($id);
            })->toArray();

            // Sync the programs to the goal
            $goal->programs()->sync($programIdsToAttach);

            // Reload the goal to refresh the programs relationship
            $goal->load('programs');

            // Check if the goal has any programs attached after syncing
            if ($goal->programs->isNotEmpty()) {
                $goalsWithPrograms[] = $goal->only(['id', 'programs']);
            }
        }

        if (!empty($errors)) {
            return response()->json(['errors' => $errors], 422);
        }

        return response()->json([
            'message' => 'Programs synced with goals successfully.',
            'goalsWithPrograms' => $goalsWithPrograms
        ]);
    }



    public function getGoalsWithPrograms($revisionId)
    {
        $goals = Goal::whereHas('programs', function ($query) use ($revisionId) {
            $query->where('revision_id', $revisionId);
        })->with(['programs' => function ($query) use ($revisionId) {
            $query->where('revision_id', $revisionId);
        }])->get();

        $formattedGoals = $goals->map(function ($goal) {
            // Since we're already filtering goals with programs, all goals here have at least one program.
            return [
                'id' => $goal->id,
                'name' => $goal->name,
                'revision_plans' => $goal->programs->map(function ($program) {
                    return [
                        'id' => $program->id,
                        'name' => $program->name,
                    ];
                })->toArray()
            ];
        });

        return response()->json(['revision_goal_plans' => $formattedGoals]);
    }
}
