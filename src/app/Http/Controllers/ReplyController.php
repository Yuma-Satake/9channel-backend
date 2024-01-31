<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function createReply()
    {
        return null;
    }
    //外部キー制約を遵守するために、thread_idとuser_idを指定して、リプライを作成する   
    public function createdReply(Request $request)
    {
        // リクエストのバリデーション
        if (empty($request->thread_id) || empty($request->body)) {
            return response()->json([
                'message' => 'thread_id or body is empty',
            ], 500);
        }
        // リプライを作成
        $reply = new Reply();
        $reply->thread_id = $request->thread_id;
        $reply->user_id = $request->user_id;
        $reply->body = $request->body;

        //try catchで失敗したら400を成功したら200を返す
        try {
            $reply->save();
            return response()->json([
                'message' => 'reply created successfully',
                'reply' => $reply
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'reply created failed'
            ], 400);
        }
    }

    //repliesテーブルから全てのデータを取得する
    public function getAllReplies()
    {
        return Reply::all();
    }

    //repliesテーブルからtread_idが一致するものを取得する
    public function getReply(Request $request)
    {
        // リクエストのバリデーション
        if (empty($request->thread_id)) {
            return response()->json([
                'message' => 'thread_id is empty',
            ], 500);
        }
        //try catchで例外処理を行う
        try {
            $reply = Reply::where('thread_id', $request->thread_id)->get();
            return response()->json([
                'message' => 'reply found successfully',
                'reply' => $reply
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'reply not found'
            ], 500);
        }
    }
}
