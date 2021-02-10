<?php

namespace Database\Seeders;

use App\Models\dummy;
use Illuminate\Database\Seeder;

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
        dummy::truncate();

        dummy::factory(10)->create();
    }
}
