<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ControlListController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DraftAuditReportController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FinalAuditReportController;
use App\Http\Controllers\FindingController;
use App\Http\Controllers\ImplementationActivityController;
use App\Http\Controllers\InfedilityListController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\OrganizationalUnitController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RevisionApprovalController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\RevisionNotificationsController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\SurveyTokenController;
use App\Models\DraftAuditReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Group routes related to user authentication and actions
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        $user = $request->user()->load('roles');
        return $user;
    });

    Route::get('/roles', [RegisteredUserController::class, 'roles']);

    Route::get('/users', [RegisteredUserController::class, 'index']);
    Route::post('/users', [RegisteredUserController::class, 'storeOnly']);
    Route::put('/users/{id}', [RegisteredUserController::class, 'update'])->where('id', '[0-9]+');
    Route::delete('/users/{id}', [RegisteredUserController::class, 'destroy'])->where('id', '[0-9]+');

    Route::post('/user/password/update', [RegisteredUserController::class, 'passwordUpdate'])->name('password.update');


    // Revision-related routes
    Route::prefix('revisions')->group(function () {
        Route::get('/', [RevisionController::class, 'index']);
        Route::post('/', [RevisionController::class, 'store']);
        Route::get('/{id}', [RevisionController::class, 'show']);
        Route::put('/{id}', [RevisionController::class, 'update']);
        Route::delete('/{id}', [RevisionController::class, 'destroy']);
        Route::get('/{revisionId}/plans', [RevisionController::class, 'getLatestRevisionPlans']);
    });

    // Program-related routes
    Route::prefix('programs')->group(function () {
        Route::get('/{revisionId?}', [ProgramController::class, 'index']);
        Route::post('/', [ProgramController::class, 'store']);
        Route::get('/show/{id}', [ProgramController::class, 'show']);
        Route::put('/{id}', [ProgramController::class, 'update']);
        Route::delete('/{id}', [ProgramController::class, 'destroy']);
    });

    // Sample-related routes
    Route::prefix('samples')->group(function () {
        Route::get('/{revisionId?}', [SampleController::class, 'index']);
        Route::post('/', [SampleController::class, 'store']);
        Route::get('/show/{id}', [SampleController::class, 'show']);
        Route::put('/{id}', [SampleController::class, 'update']);
        Route::delete('/{id}', [SampleController::class, 'destroy']);
    });

    // Report-related routes
    Route::prefix('reports')->group(function () {
        Route::get('/{revisionId}', [ReportController::class, 'index']);
        Route::post('/', [ReportController::class, 'store']);
        Route::get('/{id}', [ReportController::class, 'show']);
        Route::put('/{id}', [ReportController::class, 'update']);
        Route::delete('/{id}', [ReportController::class, 'destroy']);
    });

    // Finding-related routes
    Route::prefix('findings')->group(function () {
        Route::get('/{revisionId}', [FindingController::class, 'index']);
        Route::post('/', [FindingController::class, 'store']);
        Route::get('/{id}', [FindingController::class, 'show']);
        Route::put('/{id}', [FindingController::class, 'update']);
        Route::delete('/{id}', [FindingController::class, 'destroy']);
        Route::get('/', [FindingController::class, 'getFindings']);
        Route::get('/pdf/finding', [FindingController::class, 'generateFindingsReport']);
    });

    // Implementation activity-related routes
    Route::prefix('activities')->group(function () {
        Route::get('/{id}', [ImplementationActivityController::class, 'index']);
        Route::post('/', [ImplementationActivityController::class, 'store']);
        Route::put('/{id}', [ImplementationActivityController::class, 'update']);
        Route::delete('/{id}', [ImplementationActivityController::class, 'destroy']);
    });

    // Goal-related routes

    Route::post('/attach-programs', [GoalController::class, 'attachProgramsToGoal']);
    Route::get('/attach-programs/{revisionId}', [GoalController::class, 'getGoalsWithPrograms']);
    Route::put('/attach-programs', [GoalController::class, 'syncProgramsToGoal']);


    // Revision approval-related routes
    Route::prefix('revision-approvals')->group(function () {
        Route::post('/', [RevisionApprovalController::class, 'store']);
        Route::get('/{revision_id}', [RevisionApprovalController::class, 'show']);
        Route::put('/{revision_id}', [RevisionApprovalController::class, 'update']);
        Route::delete('/{revision_id}', [RevisionApprovalController::class, 'destroy']);
    });

    // Recommendation-related routes
    Route::prefix('recommendations')->group(function () {
        Route::get('/{findingId}', [RecommendationController::class, 'index']);
        Route::post('/', [RecommendationController::class, 'store']);
        Route::get('/show/{id}', [RecommendationController::class, 'show']);
        Route::put('/{id}', [RecommendationController::class, 'update']);
        Route::delete('/{id}', [RecommendationController::class, 'destroy']);
    });

    Route::get('/get-recommendations', [RecommendationController::class, 'getRecommendations']);
    Route::get('/generate-recommendations-report', [RecommendationController::class, 'generateRecommendationsReport']);
    Route::get('/get-revision-book', [RevisionController::class, 'getFilteredRevisions']);

    Route::post('/download-document', [DocumentController::class, 'generateDocument']);

    Route::prefix('organizational-units')->group(function () {
        Route::get('/', [OrganizationalUnitController::class, 'index']);
        Route::post('/', [OrganizationalUnitController::class, 'store']);
        Route::get('/{id}', [OrganizationalUnitController::class, 'show'])->where('id', '[0-9]+');
        Route::put('/{id}', [OrganizationalUnitController::class, 'update'])->where('id', '[0-9]+');
        Route::patch('/{id}', [OrganizationalUnitController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('/{id}', [OrganizationalUnitController::class, 'destroy'])->where('id', '[0-9]+');
    });

    Route::post('/survey/generate-token', [SurveyTokenController::class, 'generateSurveyToken']);
    Route::get('/survey/check-token/{token}', [SurveyTokenController::class, 'checkSurveyToken']);
    Route::post('/survey/submit', [SurveyTokenController::class, 'submitSurvey']);

    Route::get('/generate-revisions-book', [RevisionController::class, 'generateFilteredRevisionsDocument']);
    Route::get('/generate-revision-book-excel', [RevisionController::class, 'generateRevisionBookExcel']);

    // Routes for DraftAuditReport
    Route::prefix('draft-audit-reports')->group(function () {
        Route::get('/{revisionId}', [DraftAuditReportController::class, 'index']);
        Route::post('/', [DraftAuditReportController::class, 'store']);
        Route::put('/{id}', [DraftAuditReportController::class, 'update']);
        Route::delete('/{id}', [DraftAuditReportController::class, 'destroy']);
    });

    // Routes for FinalAuditReport
    Route::prefix('final-audit-reports')->group(function () {
        Route::get('/{revisionId}', [FinalAuditReportController::class, 'index']);
        Route::post('/', [FinalAuditReportController::class, 'store']);
        Route::put('/{id}', [FinalAuditReportController::class, 'update']);
        Route::delete('/{id}', [FinalAuditReportController::class, 'destroy']);
    });


    Route::post('/logo', [LogoController::class, 'setLogo']);
    Route::delete('/logo', [LogoController::class, 'deleteLogo']);


    Route::post('/notifications/revision-start', [RevisionNotificationsController::class, 'revisionStartNotificationSubjects']);
    Route::post('/notifications/recommendation-deadline', [RevisionNotificationsController::class, 'recommendationtDeadlineNotification']);

    // InfidelityList routes
    Route::get('/infidelity-lists/{revisionId}', [InfedilityListController::class, 'index']);
    Route::post('/infidelity-lists', [InfedilityListController::class, 'store']);
    Route::put('/infidelity-lists/{id}', [InfedilityListController::class, 'update']);
    Route::delete('/infidelity-lists/{id}', [InfedilityListController::class, 'destroy']);

    Route::get('/control-lists/{revisionId}', [ControlListController::class, 'index']);
    Route::post('/control-lists', [ControlListController::class, 'store']);
    Route::put('/control-lists/{id}', [ControlListController::class, 'update']);
    Route::delete('/control-lists/{id}', [ControlListController::class, 'destroy']);
});

Route::get('/logo', [LogoController::class, 'getLogo']);

// File management routes
Route::prefix('files')->group(function () {
    Route::any('/{id}', [FileManagerController::class, 'actions']);
    Route::get('/download/{finding_id}/{filename}', [FileUploadController::class, 'download']);
});

// File upload routes
Route::prefix('uploads')->group(function () {
    Route::get('/{recommendation_id}', [FileUploadController::class, 'index']);
    Route::post('/{recommendation_id}', [FileUploadController::class, 'store']);
    Route::delete('/{recommendation_id}/{filename}', [FileUploadController::class, 'destroy']);
});
