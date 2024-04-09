<?php

use App\Http\Controllers\AnsweredGroupController;
use App\Http\Controllers\AnsweredQuestionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\QAGroupController;
use App\Http\Controllers\StartedExamController;
use App\Http\Controllers\SubCatController;
use App\Models\AnsweredQuestion;
use App\Models\StartedExam;
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
Route::patch('/exam/{examId}/qa/{qA}', [QAController::class, 'update']);
Route::delete('/exam/{examId}/qa/{qA}', [QAController::class, 'destroy']);



Route::get('/exam/{examId}/group', [QAGroupController::class, 'indexWithQAs']);
Route::post('/exam/{examId}/group', [QAGroupController::class, 'store']);
Route::patch('/exam/{examId}/group/{qAGroup}', [QAGroupController::class, 'update']);
Route::delete('/exam/{examId}/group/{qAGroup}', [QAGroupController::class, 'destroy']);



Route::post('/exam/{examId}/started', [StartedExamController::class, 'store']);
Route::patch('/exam/{examId}/started/{startedExamId}/{completed}', [StartedExamController::class, 'update']);

Route::get('/completed', [StartedExamController::class, 'index']);
Route::get('/completed/{startedExam}', [StartedExamController::class, 'show']);
Route::get('/completed/{startedExamId}/qa', [AnsweredQuestionController::class, 'index']);
Route::get('/completed/{startedExamId}/groups', [AnsweredGroupController::class, 'index']); //change html to /group

Route::get('/completed/{answeredGroup}/group', [AnsweredGroupController::class, 'show']);


Route::post('/exam/{examId}/started/{startedExamId}', [AnsweredQuestionController::class, 'store']);
Route::post('/exam/{examId}/started/{startedExamId}/group', [AnsweredGroupController::class, 'store']);
Route::patch('/exam/{examId}/started/{startedExamId}/group/{groupId}/{answered}', [AnsweredGroupController::class, 'update']);





Route::get('/completed/qa/{qA}', [QAController::class, 'show']);
