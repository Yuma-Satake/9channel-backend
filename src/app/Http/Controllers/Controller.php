<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * practices を全て返却するAPIレスポンス
     */
    public function getPracticesApiFn()
    {
        $practices = Practice::all();
        // $resData =  [
        //     'practices' => $practices
        // ];
        // $frontData = json_encode($resData); 
        // return response()-> json($frontData);
        return response()->json(['practices' => $practices]);
    }

    // {
    //     body: {
    //         practices: [
    //             {
    //                 id: 1,
    //                 title: "タイトル1",
    //                 content: "内容1",
    //                 created_at: "2021-09-05T12:00:00.000000Z",
    //                 updated_at: "2021-09-05T12:00:00.000000Z"
    //             },
    //             {
    //                 id: 2,
    //                 title: "タイトル2",
    //                 content: "内容2",
    //                 created_at: "2021-09-05T12:00:00.000000Z",
    //                 updated_at: "2021-09-05T12:00:00.000000Z"
    //             },
    //         ]
    //     }
    // }
}
