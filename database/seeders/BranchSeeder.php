<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $branchs = [
            [
                'branchs_name' => 'สาขาวิชาคอมพิวเตอร์และเทคโนโลยีสารสนเทศ',
                'status' => 1,
                'faculty_id' => 1,
            ],
            [
                'branchs_name' => 'คณิตศาสตร์และสถิติ',
                'status' => 1,
                'faculty_id' => 1,
            ],
          
        ];
        foreach ($branchs as $key => $branch) {
            Branch::create($branch);
        }
    }
}
