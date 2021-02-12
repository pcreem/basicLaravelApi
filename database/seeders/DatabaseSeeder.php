<?php

namespace Database\Seeders;

use App\Models\Dummy;
use App\Models\Type;
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
        Dummy::truncate();
        Type::truncate();

        Type::factory(10)->create();
        Dummy::factory(10)->create();
    }
}
