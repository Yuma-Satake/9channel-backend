<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThreadController extends Controller
{

    //threadテーブルの全てのデータを取得して、index.blade.phpに渡す
    public function index()
    {
        $threads = \App\Models\Thread::all();
        return view('index', compact('thread'));
    }
}
