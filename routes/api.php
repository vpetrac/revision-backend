<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\FindingController;
use App\Http\Controllers\ImplementationActivityController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RevisionApprovalController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\SampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Protect all revision routes with Sanctum authentication
Route::middleware('auth:sanctum')->group(function () {
    // List all revisions
    Route::get('/revisions', [RevisionController::class, 'index']);

    // Create a new revision
    Route::post('/revisions', [RevisionController::class, 'store']);

    // Get a specific revision by ID
    Route::get('/revisions/{id}', [RevisionController::class, 'show']);

    // Update a specific revision by ID
    Route::put('/revisions/{id}', [RevisionController::class, 'update']);
    // or use Route::patch if you prefer partial updates

    // Delete a specific revision by ID
    Route::delete('/revisions/{id}', [RevisionController::class, 'destroy']);

    Route::get('/revisions/{revisionId}/plans', [RevisionController::class, 'getLatestRevisionPlans']);

    // List all programs or programs for a specific revision
    Route::get('/programs/{revisionId?}', [ProgramController::class, 'index']);

    // Create a new program
    Route::post('/programs', [ProgramController::class, 'store']);

    // Get a specific program by ID
    Route::get('/programs/show/{id}', [ProgramController::class, 'show']);

    // Update a specific program by ID
    Route::put('/programs/{id}', [ProgramController::class, 'update']);
    // or use Route::patch if you prefer partial updates

    // Delete a specific program by ID
    Route::delete('/programs/{id}', [ProgramController::class, 'destroy']);

    // List all samples or samples for a specific revision
    Route::get('/samples/{revisionId?}', [SampleController::class, 'index']);

    // Create a new sample
    Route::post('/samples', [SampleController::class, 'store']);

    // Get a specific sample by ID
    Route::get('/samples/show/{id}', [SampleController::class, 'show']);

    // Update a specific sample by ID
    Route::put('/samples/{id}', [SampleController::class, 'update']);
    // Alternatively, use Route::patch for partial updates

    // Delete a specific sample by ID
    Route::delete('/samples/{id}', [SampleController::class, 'destroy']);

    // List all reports or reports for a specific revision
    Route::get('/reports/{revisionId}', [ReportController::class, 'index']);

    // Create a new report
    Route::post('/reports', [ReportController::class, 'store']);

    // Get a specific report by ID
    Route::get('/reports/{id}', [ReportController::class, 'show']);

    // Update a specific report by ID
    Route::put('/reports/{id}', [ReportController::class, 'update']);
    // Alternatively, use Route::patch for partial updates

    // Delete a specific report by ID
    Route::delete('/reports/{id}', [ReportController::class, 'destroy']);

    Route::get('/findings/{revisionId}', [FindingController::class, 'index']);
    Route::post('/findings', [FindingController::class, 'store']);
    Route::get('/findings/{id}', [FindingController::class, 'show']);
    Route::put('/findings/{id}', [FindingController::class, 'update']);
    Route::delete('/findings/{id}', [FindingController::class, 'destroy']);

    // List all implementation activities for a specific finding
    Route::get('/findings/{findingId}/activities', [ImplementationActivityController::class, 'index']);

    // Create a new implementation activity
    Route::post('/activities', [ImplementationActivityController::class, 'store']);

    // Get a specific implementation activity by ID
    Route::get('/activities/{id}', [ImplementationActivityController::class, 'show']);

    // Update a specific implementation activity by ID
    Route::put('/activities/{id}', [ImplementationActivityController::class, 'update']);

    // Delete a specific implementation activity by ID
    Route::delete('/activities/{id}', [ImplementationActivityController::class, 'destroy']);

    // List all implementation activities for a specific finding
    Route::post('/attach-programs', [GoalController::class, 'attachProgramsToGoal']);

    Route::get('/attach-programs/{revisionId}', [GoalController::class, 'getGoalsWithPrograms']);

    Route::put('/attach-programs', [GoalController::class, 'syncProgramsToGoal']);

    Route::get('revision-approvals/{revision_id}', [RevisionApprovalController::class, 'index']);
    Route::post('revision-approvals/{revision_id}', [RevisionApprovalController::class, 'store']);
    Route::get('revision-approvals/{revision_id}', [RevisionApprovalController::class, 'show']);
    Route::put('revision-approvals/{revision_id}', [RevisionApprovalController::class, 'update']);
    Route::delete('revision-approvals/{revision_id}', [RevisionApprovalController::class, 'destroy']);
});

Route::any('/files/{id}', [FileManagerController::class, 'actions']);

// Here's the route to retrieve the authenticated user, snugly inside Sanctum's embrace
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
