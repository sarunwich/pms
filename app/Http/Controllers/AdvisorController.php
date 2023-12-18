<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use App\Models\Faculty;
use App\Models\User;
use App\Models\Teach_bus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function add()
    {
        $faculties = Faculty::all();
        $users = User::where('type', '=', '3')
        ->orWhere('type', '=', '2')
        ->get();


        return view('manager.Advisor_add', compact('faculties','users'));
    }
    public function addteacher(Request $request)
    {
        $faculties = Faculty::all();


        $validatedData = $request->validate([
            'prefix' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'faculty' => ['required'],
            'branch' => ['required'],
            'major' => ['required'],
            'phone' => ['required', 'string', 'max:15', 'min:8'],

        ]);
        $user = User::create([
            'prefix' => $validatedData['prefix'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'faculty_id' => $validatedData['faculty'],
            'branch_id' => $validatedData['branch'],
            'major_id' => $validatedData['major'],
            'Phone' => $validatedData['phone'],
            'type' => 3,

        ]);
        if ($user) {
            // Insert was successful
            $message = "Advisor inserted successfully!";
        } else {
            // Insert failed
            $message = "Advisor insertion failed.";
        }
        // $users = User::all();
        // return view('manager.Advisor_add', compact('faculties','users'));
        return response()->json(['message' => $message]);
    }
    public function assignAdvisor()
    {
        if (date("m") >= 6) {
            $yy = date("Y") + 543;
        } else {
            $yy = date("Y") + 542;
        }
        $users = User::where('type', '=', '3')->get();
        $students = User::where('type', '=', '0')->get();
        // $Teachbus = Teach_bus::where('year', $yy)
        //     ->get();

        $Teachbus =  DB::select("
            SELECT tu_teacher.name AS teacher_name, tu_student.name AS student_name ,teach_buses.id as id
            FROM teach_buses
            JOIN users AS tu_teacher ON teach_buses.teachID = tu_teacher.id
            JOIN users AS tu_student ON teach_buses.Stdid = tu_student.id
        ");
        return view('manager.Assign_advisor', compact('users', 'students','Teachbus' ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
