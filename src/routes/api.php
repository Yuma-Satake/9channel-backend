<?php

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/createThread', [ThreadController::class,'createdThread']);