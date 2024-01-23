<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //repliesテーブルから全てのデータを取得する
    public function getAllReplies()
    {
        return Reply::all();
    }

    //repliesテーブルからtread_idが一致するものを取得する
    public function getReply(Request $request)
    {
        return Reply::where('thread_id', $request->thread_id)->get();
    }
}
