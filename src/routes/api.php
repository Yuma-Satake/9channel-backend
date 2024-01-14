<?php

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


/**
 * rest/v1/randomaspirationview?limit=10
 *
 * 以下のレスポンスを返すapi
 *     {
 *       "id": 62,
 *       "aspiration": "新卒エンジニアがんばる",
 *       "name": "ミミミ",
 *      "isWebAccess": true,
 *      "createdAt": "2024-01-14T11:44:06.87749+00:00"
 *  },
 */
Route::get('/randomaspirationview', function (Request $request) {
    $limit = $request->input('limit');
    $aspirations = DB::table('aspirations')->limit($limit)->get();
    return response()->json($aspirations, 200);
});

Route::post('/aspiration', function (Request $request) {
    $aspiration = $request->input('aspiration');
    $name = $request->input('name');
    $isWebAccess = $request->input('isWebAccess');
    $createdAt = $request->input('createdAt');
    DB::table('aspirations')->insert([
        'aspiration' => $aspiration,
        'name' => $name,
        'isWebAccess' => $isWebAccess,
        'createdAt' => $createdAt,
    ]);
    return response()->json(['message' => 'OK'], 200);
});

Route::get('/practice', [PracticeController::class, 'getPracticesApiFn']);
