<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'admin@tsu.ac.th',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Manager User',
               'email'=>'manager@tsu.ac.th',
               'type'=> 2,
               'password'=> bcrypt('123456'),
               'faculty_id'=>1,
               'branch_id'=>1,
               'major_id'=>1,
            ],
            [
               'name'=>'User',
               'email'=>'user@tsu.ac.th',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'อาจารี นาโค',
                'email'=>'ajaree@tsu.ac.th',
                'type'=> 2,
                'password'=> bcrypt('123456'),
                'faculty_id'=>1,
                'branch_id'=>1,
                'major_id'=>1,
             ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
