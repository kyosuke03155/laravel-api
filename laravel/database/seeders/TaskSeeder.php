<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::create([
            'title' => '金魚に餌をあげる',
            'description' => '明日の9時にオフィスの金魚に餌をあげる',
            'is_done' => false,
        ]);

        Task::create([
            'title' => 'ミーティング資料印刷',
            'description' => 'たかしとのミーティングまでにスライドを印刷する',
            'is_done' => true,
        ]);
    }
}
