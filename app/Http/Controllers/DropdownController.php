<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\major;

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
}
