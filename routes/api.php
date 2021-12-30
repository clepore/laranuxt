<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ExperienceController;
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

Route::get('/', [Controller::class, 'routes'])
    ->name('route information')
    ->withoutMiddleware('api');
Route::get('/example', [Controller::class, 'example'])->name('example route');
Route::get('/error', [Controller::class, 'error'])->name('error route');

Route::get('/candidates', [CandidateController::class, 'index']);

Route::post('/experiences', [ExperienceController::class, 'store']);
Route::delete('/experiences/{experience}', [ExperienceController::class, 'destroy']);
Route::patch('/experiences/{experience}', [ExperienceController::class, 'update']);
Route::get('/experiences', [ExperienceController::class, 'index']);
