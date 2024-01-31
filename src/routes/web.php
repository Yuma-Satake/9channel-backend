<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ここにAPIルートや他の特定のルートを定義

// Reactアプリケーションのエントリポイント（/api を除く）
Route::get('/{path?}', function ($path = null) {
    $pathToFile = public_path('react-app/index.html');
    if (!File::exists($pathToFile)) {
        abort(404); // ファイルが見つからない場合は404エラーを返す
    }
    return File::get($pathToFile);
})->where('path', '^(?!api).*$'); // /api を除外
