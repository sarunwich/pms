<?php

namespace App\Http\Controllers;

use App\Models\Teach_bus;
use App\Models\User;
use App\Models\Reportstd;
use App\Models\Picreport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SupervisionController extends Controller
{
    //
    public function StudentsUnderCare(Request $request)
    {
        $groupYears = Teach_bus::select('teachID', 'year')
            ->where('teachID', Auth::user()->id)
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();
        if (date("m") >= 6) {
            $yy = date("Y") + 543;
        } else {
            $yy = date("Y") + 542;
        }
        $search = $request->input('search');
        if ($search) {
            $yy = $search;
            $Teachbus =  DB::select("
            SELECT tu_teacher.name AS teacher_name, tu_student.name AS student_name ,teach_buses.id as id ,tu_student.student_code as student_code ,tu_student.id as student_id ,tu_student.prefix as prefix
            FROM teach_buses 
            JOIN users AS tu_teacher ON teach_buses.teachID = tu_teacher.id
            JOIN users AS tu_student ON teach_buses.Stdid = tu_student.id where teach_buses.year = " . $search . " and teach_buses.teachID= ".Auth::user()->id."
        ");
        } else {
            $Teachbus =  DB::select("
            SELECT tu_teacher.name AS teacher_name, tu_student.name AS student_name ,teach_buses.id as id ,tu_student.student_code as student_code,tu_student.id as student_id,tu_student.prefix as prefix 
            FROM teach_buses 
            JOIN users AS tu_teacher ON teach_buses.teachID = tu_teacher.id
            JOIN users AS tu_student ON teach_buses.Stdid = tu_student.id where teach_buses.year = " . $yy . " and teach_buses.teachID= ".Auth::user()->id."
            ");
        }



        return view("supervision.StudentsUnderCare", compact('groupYears', 'Teachbus', 'yy'));
    }
    public function mStudentsUnderCare(Request $request)
    {
        $groupYears = Teach_bus::select('teachID', 'year')
            ->where('teachID', Auth::user()->id)
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();
        if (date("m") >= 6) {
            $yy = date("Y") + 543;
        } else {
            $yy = date("Y") + 542;
        }
        $search = $request->input('search');
        if ($search) {
            $yy = $search;
            $Teachbus =  DB::select("
            SELECT tu_teacher.name AS teacher_name, tu_student.name AS student_name ,teach_buses.id as id ,tu_student.student_code as student_code ,tu_student.id as student_id ,tu_student.prefix as prefix
            FROM teach_buses 
            JOIN users AS tu_teacher ON teach_buses.teachID = tu_teacher.id
            JOIN users AS tu_student ON teach_buses.Stdid = tu_student.id where teach_buses.year = " . $search . " and teach_buses.teachID= ".Auth::user()->id."
        ");
        } else {
            $Teachbus =  DB::select("
            SELECT tu_teacher.name AS teacher_name, tu_student.name AS student_name ,teach_buses.id as id ,tu_student.student_code as student_code,tu_student.id as student_id,tu_student.prefix as prefix 
            FROM teach_buses 
            JOIN users AS tu_teacher ON teach_buses.teachID = tu_teacher.id
            JOIN users AS tu_student ON teach_buses.Stdid = tu_student.id where teach_buses.year = " . $yy . " and teach_buses.teachID= ".Auth::user()->id."
            ");
        }



        return view("manager.StudentsUnderCare", compact('groupYears', 'Teachbus', 'yy'));
    }
    public function show($id)
    {
        $data = User::find($id);
        return response()->json($data);
    }
    public function stdreportta(Request $request)
    {

        $groupYears = Teach_bus::select('teachID', 'year')
            ->where('teachID', Auth::user()->id)
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();
        if (date("m") >= 6) {
            $yy = date("Y") + 543;
        } else {
            $yy = date("Y") + 542;
        }
        $search = $request->input('search');
        if ($search) {
            $yy = $search;
            $Teachbus =  DB::select("
            SELECT tu_teacher.name AS teacher_name, tu_student.name AS student_name ,teach_buses.id as id ,tu_student.student_code as student_code ,tu_student.id as student_id ,tu_student.prefix as prefix
            FROM teach_buses 
            JOIN users AS tu_teacher ON teach_buses.teachID = tu_teacher.id
            JOIN users AS tu_student ON teach_buses.Stdid = tu_student.id where teach_buses.year = " . $search . " and teach_buses.teachID= ".Auth::user()->id."
        ");
        } else {
            $Teachbus =  DB::select("
            SELECT tu_teacher.name AS teacher_name, tu_student.name AS student_name ,teach_buses.id as id ,tu_student.student_code as student_code,tu_student.id as student_id,tu_student.prefix as prefix 
            FROM teach_buses 
            JOIN users AS tu_teacher ON teach_buses.teachID = tu_teacher.id
            JOIN users AS tu_student ON teach_buses.Stdid = tu_student.id 
            where teach_buses.year = " . $yy . " and teach_buses.teachID= ".Auth::user()->id."
            ");
        }

        return view("supervision.stdreportta", compact('groupYears', 'Teachbus', 'yy'));
    }

    public function mstdreportta(Request $request)
    {

        $groupYears = Teach_bus::select('teachID', 'year')
            ->where('teachID', Auth::user()->id)
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();
        if (date("m") >= 6) {
            $yy = date("Y") + 543;
        } else {
            $yy = date("Y") + 542;
        }
        $search = $request->input('search');
        if ($search) {
            $yy = $search;
            $Teachbus =  DB::select("
            SELECT tu_teacher.name AS teacher_name, tu_student.name AS student_name ,teach_buses.id as id ,tu_student.student_code as student_code ,tu_student.id as student_id ,tu_student.prefix as prefix
            FROM teach_buses 
            JOIN users AS tu_teacher ON teach_buses.teachID = tu_teacher.id
            JOIN users AS tu_student ON teach_buses.Stdid = tu_student.id where teach_buses.year = " . $search . " and teach_buses.teachID= ".Auth::user()->id."
        ");
        } else {
            $Teachbus =  DB::select("
            SELECT tu_teacher.name AS teacher_name, tu_student.name AS student_name ,teach_buses.id as id ,tu_student.student_code as student_code,tu_student.id as student_id,tu_student.prefix as prefix 
            FROM teach_buses 
            JOIN users AS tu_teacher ON teach_buses.teachID = tu_teacher.id
            JOIN users AS tu_student ON teach_buses.Stdid = tu_student.id 
            where teach_buses.year = " . $yy . " and teach_buses.teachID= ".Auth::user()->id."
            ");
        }

        return view("manager.stdreportta", compact('groupYears', 'Teachbus', 'yy'));
    }

    public function fetchData($id)
    {
        // Fetch data based on $id (assuming $id is the identifier for your data)
        $data = Reportstd::where('user_id', $id)->get(); // Modify this according to your actual database schema

        // return response()->json(['data' => $data]);
        return response()->json($data);
    }
    public function fetchDataDetail($id)
    {
        $images=Picreport::where('reportstd_id', $id)->get();
        $data = Reportstd::where('id', $id)->first();
        $data = Reportstd::find($id);
        $data->Advisors = 1;
        $data->save();
        return response()->json([
            'data1' => $data,
            'images' => $images,
        ]);
    }
}
