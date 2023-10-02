<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\major;
class CreateMajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $majors = [
          
            [
                'majors_name' => 'วิทยาการคอมพิวเตอร์',
                'status' => 1,
                'branch_id' => 1,
            ],
            [
                'majors_name' => 'เทคโยโลยีสารสนเทศ',
                'status' => 1,
                'branch_id' => 1,
            ],
        ];
        foreach ($majors as $key => $major) {
            major::create($major);
        }
    }
}
