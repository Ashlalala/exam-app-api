<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\SubCatController;
use App\Models\SubCat;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/{user}', [AuthController::class, 'show']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::get('exams/cats', [CatController::class, 'index']);
Route::post('exams/cats', [CatController::class, 'store']);


Route::get('/exams/{category}', [SubCatController::class, 'index']);
Route::post('/exams/{category}', [SubCatController::class, 'store']);


//change to ApiResource
Route::get('/exams/{category}/{subCategory}', [ExamController::class, 'index']);
Route::post('/exams/{category}/{subCategory}', [ExamController::class, 'store']);


Route::get('/exam/{exam}', [ExamController::class, 'show']);


Route::get('/exam/{examId}/qa', [QAController::class, 'index']);
Route::post('/exam/{examId}/qa', [QAController::class, 'store']);

