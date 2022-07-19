<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TasktodoSeeder;
use Database\Seeders\TaskinprogressSeeder;
use Database\Seeders\TaskfinishedSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([UserSeeder::class]);
        $this->call([TasktodoSeeder::class]);
        $this->call([TaskinprogressSeeder::class]);
        $this->call([TaskfinishedSeeder::class]);
    }
}
