<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\major;
use App\Models\Amphur;
use App\Models\District;

class DropdownController extends Controller
{
    //
    public function getBranches(Request $request)
    {
        $facultyId = $request->input('faculty_id');
        $branches = Branch::where('faculty_id', $facultyId)->get();
        return response()->json(['branches' => $branches]);
    }

    public function getMajors(Request $request)
    {
        $branchId = $request->input('branch_id');
        $majors = Major::where('branch_id', $branchId)->get();
        return response()->json(['majors' => $majors]);
    }

    public function getAmphur(Request $request)
    {
        $province_id = $request->input('province_id');
        $amphurs = Amphur::where('PROVINCE_ID', $province_id)->get();
        return response()->json(['amphurs' => $amphurs]);
    }

    public function getDistrict(Request $request)
    {
        $amphur_id = $request->input('amphur_id');
        $districts = District::where('AMPHUR_ID', $amphur_id)->get();
        return response()->json(['districts' => $districts]);
    }
}
