<?php

use App\Http\Controllers\ProgramController;
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
});

// Here's the route to retrieve the authenticated user, snugly inside Sanctum's embrace
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});