<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //初期データ用意（列名をキーとする連想配列）
        $replies = [
            [
                'reply_id' => '1',
                'thread_id' => '1',
                'user_id' => null,
                'body' => 'ワロタ',
                'created_at' => '2024-01-08',
            ],
            [
                'reply_id' => '2',
                'thread_id' => '1',
                'user_id' => null,
                'body' => 'ワロタ',
                'created_at' => '2024-01-09',
            ],
            [
                'reply_id' => '3',
                'thread_id' => '2',
                'user_id' => null,
                'body' => 'ワロタ',
                'created_at' => '2024-01-09',
            ],    
        ];

        // 登録
        DB::table('replies')->insert($replies);
    }
}
