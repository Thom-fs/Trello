<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\task_todo;


class TasktodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        task_todo::factory()->count(12)->create();
    }
}
