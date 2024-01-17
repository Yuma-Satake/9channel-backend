<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB class
class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 初期データ用意（列名をキーとする連想配列）
        $threads = [
            [
                'thread_title' => 'test_title1',
                'thread_content' => 'test_content1',
                'owner_id' => '1',
                'created_at' => '2021-01-01',
            ],
            [
                'thread_title' => 'test_title2',
                'thread_content' => 'test_content2',
                'owner_id' => '2',
                'created_at' => '2021-01-02',
            ],
            [
                'thread_title' => 'test_title3',
                'thread_content' => 'test_content3',
                'owner_id' => '3',
                'created_at' => '2021-01-03',
            ],
        ];
        // 登録
        DB::table('threads')->insert($threads); // Use the DB class to insert data into the 'threads' table
    }
}
