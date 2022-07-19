<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\task_finished;


class TaskfinishedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        task_finished::factory()->count(5)->create();
    }
}
