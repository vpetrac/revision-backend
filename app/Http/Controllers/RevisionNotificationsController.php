<?php

namespace App\Http\Controllers;

use App\Mail\RecommendationDeadlineEmail;
use App\Mail\RevisionStartMail;
use App\Models\OrganizationalUnit;
use App\Models\Recommendation;
use App\Models\Revision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RevisionNotificationsController extends Controller
{
    public function revisionStartNotificationSubjects(Request $request)
    {
        $revisionId = $request->input('revision_id');
        $revision = Revision::findOrFail($revisionId);

        $auditTeamMembers = json_decode($revision->auditTeamMembers, true) ?? [];

        foreach ($auditTeamMembers as $orgUnit) {
            $orgUnitId = $orgUnit['value']; // Where 'value' is the userId
            $orgUnitModel = OrganizationalUnit::findOrFail($orgUnitId); // Ensure the user exists
            $userId = $orgUnitModel->head_id;
            $user = User::findOrFail($userId);

            Mail::to($user->email)->send(new RevisionStartMail($revision));
        }

        return response()->json(['message' => 'Survey links have been sent to all subjects.']);
    }

    public function recommendationtDeadlineNotification(Request $request)
    {
        $recommendationId = $request->input('recommendation_id');
        $recommendation = Recommendation::findOrFail($recommendationId);

        $responsibility = json_decode($recommendation->responsibility, true) ?? [];
        $revision = Revision::findOrFail($recommendation->revision_id);


        foreach ($responsibility as $orgUnit) {
            $orgUnitId = $orgUnit['value']; // Where 'value' is the userId
            $orgUnitModel = OrganizationalUnit::findOrFail($orgUnitId); // Ensure the user exists
            $userId = $orgUnitModel->head_id;
            $user = User::findOrFail($userId);

            Mail::to($user->email)->send(new RecommendationDeadlineEmail($user, $revision));
        }

        return response()->json(['message' => 'Survey links have been sent to all subjects.']);
    }
}
