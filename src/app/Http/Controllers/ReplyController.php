<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //外部キー制約を遵守するために、thread_idとuser_idを指定して、リプライを作成する   
    public function createReply(Request $request)
    {
        // リクエストのバリデーション
        if (empty($request['thread_id']) || empty($request['body'])) {
            return response()->json([
                'message' => 'thread_id or body is empty',
            ], 500);
        }
        // リプライを作成
        $reply = new Reply();
        $reply->thread_id = $request->thread_id;
        $reply->user_id = $request->user_id;
        $reply->body = $request->body;
        $reply->save();
        // リプライが作成されたら、201ステータスコードを返す
        return response()->json([
            'message' => 'reply created successfully'
        ], 200);
    }
    
}
