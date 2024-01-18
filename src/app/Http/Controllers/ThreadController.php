<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function getAllThreads()
    {
        return Thread::all();
    }

   /*
   *get latest thread
   * 最新のthreadを5件取得する
   * @return Thread[]
   */ 
    public function getLatestThreads()
    {
        return Thread::orderBy('created_at', 'desc')->take(5)->get();
    }

    public function getThread($id)
    {
        return Thread::find($id);
    }
}


