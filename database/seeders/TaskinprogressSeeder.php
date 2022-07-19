<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\task_inprogress;

class TaskinprogressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        task_inprogress::factory()->count(10)->create();
    }
}
