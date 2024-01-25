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
   * ステータスコード200とともにjson形式で返す
   * 取得に失敗したらステータスコード500を返す
   */ 
    public function getLatestThreads()
    {
        $threads = Thread::orderBy('created_at', 'desc')->take(5)->get();

        if (empty($threads)) {
            return response()->json([
                'message' => 'thread not found'
            ], 500);
        }

        return response()->json([
            'message' => 'thread found successfully',
            'thread' => $threads
        ], 200);
    }

    /*
     * getThread
     * クエリパラメータで指定されたthread_idのthreadを取得する  
     * @param Request $request
     * ステータスコード200とともにjson形式で返す
     * 取得に失敗したらステータスコード500を返す
     */
    public function getThread(Request $request)
    {
        $thread = Thread::where('thread_id', $request->thread_id)->first();

        if (empty($thread)) {
            return response()->json([
                'message' => 'thread not found'
            ], 500);
        }

        return response()->json([
            'message' => 'thread found successfully',
            'thread' => $thread
        ], 200);
    }
    
    /*
    *thredsテーブルにrowを追加する
    * @param Request $request
    * ステータスコード201を返す
    失敗したらステータスコード500を返す
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

        try {
            $thread->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'thread created failed'
            ], 500);
        }
        
        return response()->json([
            'message' => 'thread created successfully'
        ], 201);
    }
}


