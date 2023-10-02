<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Facultys = [
            [
               'faculty_name'=>'คณะวิทยาศาสตร์และนวัตกรรมดิจิทัล',
               'status'=>1,  
            ]
            ];
            foreach ($Facultys as $key => $Faculty) {
                Faculty::create($Faculty);
            }
    }
}
