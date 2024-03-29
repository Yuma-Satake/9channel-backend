<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * メールアドレスが一致したユーザー情報を取得する
     * メールアドレスがなかったらステータスコード401を返す
     * @param Request $request
     * @return User
     */
    public function getUser(Request $request)
    {
        //バリデーションチェック
        if (empty($request->email)) {
            return response()->json([
                'message' => 'email is empty'
            ], 500);
        }
        //try catchで例外処理を行う
        try {
            $user = User::where('email', $request->email)->first();
            return response()->json([
                'message' => 'user found successfully',
                'user' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'user not found'
            ], 401);
        }
    }

    
    public function createUser()
    {
        return null;
    }
    // users_tableにデータを追加する
    public function createdUser(Request $request)
    {
        // リクエストのバリデーション
        if (empty($request['name']) || empty($request['email'])) {
            return response()->json([
                'message' => 'name or email is empty',
            ], 500);
        }
        // ユーザーを作成
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        
        // try catchで失敗したら400を成功したら200を返す
        try {
            $user->save();
            return response()->json([
                'message' => 'user created successfully',
                'user' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'user created failed'
            ], 400);
        }
    }

}
