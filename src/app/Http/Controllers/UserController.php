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
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            return response()->json([
                'message' => 'user not found'
            ], 401);
        }
        //ステータスコード200とユーザー情報をjson形式で返す
        return response()->json([
            'message' => 'user found successfully',
            'user' => $user
        ], 200);
    }
    // users_tableにデータを追加する
    public function createdUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        // try checkで失敗したら400を成功したら200を返す
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
