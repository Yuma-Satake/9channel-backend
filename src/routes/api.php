<?php

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/threads', 'App\Http\Controllers\ThreadController@getAllThreads');
Route::get('/replies', 'App\Http\Controllers\ReplyController@getAllReplies');

Route::get('/latest', [ThreadController::class,'getLatestThreads']);

Route::get('/thread', [ThreadController::class,'getThread']);
Route::get('/reply', [ReplyController::class,'getReply']);
Route::get('/user', [UserController::class,'getUser']);

Route::get('/createReply', [ReplyController::class,'createReply']);
Route::post('/createReply', [ReplyController::class,'createdReply']);

Route::get('/createUser', [UserController::class,'createUser']);
Route::post('/createUser', [UserController::class,'createdUser']);

Route::get('/createThread', [ThreadController::class,'createThread']);
Route::post('/createThread', [ThreadController::class,'createdThread']);