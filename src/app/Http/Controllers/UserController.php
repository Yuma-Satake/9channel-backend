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
    

}
