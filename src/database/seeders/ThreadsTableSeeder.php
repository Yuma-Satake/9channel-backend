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
                'thread_title' => '松本人志さん　芸能活動休止を発表　Xでは「事実無根なので闘いまーす。」と投稿 ワイドナショーは出演せず',
                'thread_content' => '8日、ダウンタウンの松本人志さんが芸能活動を休止することを吉本興業株式会社が発表しました。',
                'owner_id' => '1',
                'created_at' => '2024-01-08',
            ],
            [
                'thread_title' => '【野球】西武が山川穂高の人的補償に和田毅指名へ　近日中に発表　ソフトバンクの顔が衝撃の移籍★3 [愛の戦士★]',
                'thread_content' => '西武がソフトバンクにFA移籍した山川穂高内野手（32）の人的補償として、和田毅投手（42）を指名する方針を固めたことが10日、分かった。',
                'owner_id' => '2',
                'created_at' => '2024-01-11',
            ],
            [
                'thread_title' => '高校生4人逮捕、住宅を襲撃 女性の口ふさぎ「金があるのは分かっている」 5千円奪う [蚤の市★]',
                'thread_content' => '高校生4人を逮捕、住宅を襲撃…女性の口ふさぎ「金があるのは分かっている」、包丁を見せて暴行し5千円奪う',
                'owner_id' => '3',
                'created_at' => '2024-01-17',
            ],
        ];
        // 登録
        DB::table('threads')->insert($threads); // Use the DB class to insert data into the 'threads' table
    }
}
