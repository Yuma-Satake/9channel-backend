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
    
    public function createThread() {
        //スレッド作成画面を表示する
        //暫定でcreateThreadを表示しています
        return 'createThread';
    }


    /*
    *thredsテーブルにrowを追加する
    * @param Request $request
    * @return Thread
    $reuestに入っている値を全てthreadsテーブルに追加する
     */
    public function createdThread(Request $request)
    {
        $thread = new Thread();
        $thread->thread_title = $request->thread_title;
        $thread->thread_content = $request->thread_content;
        $thread->owner_id = $request->owner_id;
        $thread->created_at = $request->created_at;
        $thread->img_url = $request->img_url;
        $thread->save();
        return $thread;
    }
}


