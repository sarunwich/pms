<?php

namespace Database\Seeders;

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
        
        $this->call(FacultySeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(CreateMajorsSeeder::class);
        $this->call(CreateUsersSeeder::class);
    }
}
