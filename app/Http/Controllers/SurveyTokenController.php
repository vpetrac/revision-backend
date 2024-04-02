<?php

namespace App\Http\Controllers;

use App\Mail\SurveyLinkMail;
use App\Models\SurveyResponse;
use App\Models\SurveyToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SurveyTokenController extends Controller
{
    public function generateSurveyToken(Request $request)
    {
        $userId = $request->input('user_id');
        $revisionId = $request->input('revision_id');

        $token = SurveyToken::generateToken($userId, $revisionId);

        $user = User::findOrFail($userId); // Ensure the user exists

        $url = env('FRONTEND_URL', 'http://localhost:3000');

        // Send the email
        Mail::to($user->email)->send(new SurveyLinkMail($user, $token->token, $url));

        return response()->json(['message' => 'Survey link has been sent.']);
    }

    public function submitSurvey(Request $request)
    {
        $tokenStr = $request->input('token');

        // Find the token and check if it has been used
        $token = SurveyToken::where('token', $tokenStr)->first();
        if (!$token || $token->used) {
            return response()->json(['message' => 'Invalid or already used token'], 403);
        }

        // Validate the survey responses
        $validator = Validator::make($request->all(), [
            'responses' => 'required|array',
            'responses.*.question' => 'required|string',
            'responses.*.answer' => 'required', // Customize based on your needs
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Save the survey response
        $responses = $request->input('responses');
        $surveyResponse = new SurveyResponse([
            'content' => $responses, // Assuming 'content' is your JSON column
            'user_id' => $token->user_id,
            'revision_id' => $token->revision_id,
        ]);
        $surveyResponse->save();

        // Mark the token as used to prevent reuse
        $token->update(['used' => true]);

        return response()->json(['message' => 'Survey submitted successfully']);
    }

    public function checkSurveyToken($tokenStr)
    {
        $token = SurveyToken::where('token', $tokenStr)->first();

        if (!$token) {
            return response()->json(['message' => 'Token is invalid.'], 404);
        }

        if ($token->used) {
            return response()->json(['message' => 'Token has already been used.'], 403);
        }

        return response()->json(['message' => 'Token is valid.', 'token' => $token]);
    }
}
