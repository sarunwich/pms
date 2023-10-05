<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\Apprenty;
use Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{
    //
    public function rinternship()
    {
        return view('users.RegisterInternship');
    }
    public function  internshiprr() 
     {
        return view('users.InternshipRegistrationResults');
    }
    public function Internship_form()
    {
        return view('users.Internship_form');
    }
    public function Internship_status()
    {
        $uid = Auth::user()->id;
        $apprentys=Apprenty::where('apprenties.user_id', $uid)
        ->join('agencies', 'agencies.id', '=', 'apprenties.agency_id')
        ->join('statuses', 'statuses.id', '=', 'apprenties.status')
        
        ->select('apprenties.*', 'agencies.agenciesTHname as agenciesTHname','statuses.status_name as status_name')
        ->get();
        return view('users.Internship_status',compact('apprentys'));
    }
    public function Internship_reports()
    {
        return view('users.Internship_reports');
    }
    public function Internship_information()
    {
        return view('users.Internship_information');
    }
    public function  Internship_edit() 
    {
        return view('users.Internship_edit');
    }
    public function Internship_print()
    {
        return view('users.Internship_print');
    }
    public function Internship_form_save(Request $request)
    {
        $validatedData = $request->validate([
            'year' => 'required|min:4|max:4',
            'filePermissionToUpload' => 'required|mimes:pdf|max:8192',
            'fileResumeToUpload' => 'required|mimes:pdf|max:8192',
            'fileTranscriptToUpload' => 'required|mimes:pdf|max:8192',
            'Agency'=> 'required',
            'boss'=> 'required',
            'sent'=> 'required',
            'startday'=> 'required|date',
            'lastday'=> 'required|date',
            'level'=> 'required',
        ]);

        if ($request->hasfile('filePermissionToUpload')) {

            $filename = $request->file('filePermissionToUpload')->getClientOriginalName();
            $filename = explode(".", $filename);
            $name = "PM_" . $filename[0] . "_" . time() . rand(1, 100) . '.' . $request->filePermissionToUpload->extension();
            // $request->plan_file->move(public_path('plan_file'), $name);
            $request->filePermissionToUpload->storeAs('public/Permission', $name);
            $Permission_file_name = $name;

        }
        if ($request->hasfile('fileResumeToUpload')) {

            $filename = $request->file('fileResumeToUpload')->getClientOriginalName();
            $filename = explode(".", $filename);
            $name = "PR_" . $filename[0] . "_" . time() . rand(1, 100) . '.' . $request->fileResumeToUpload->extension();
            // $request->plan_file->move(public_path('plan_file'), $name);
            $request->fileResumeToUpload->storeAs('public/Profile', $name);
            $Profile_file_name = $name;

        }
        if ($request->hasfile('fileTranscriptToUpload')) {

            $filename = $request->file('fileTranscriptToUpload')->getClientOriginalName();
            $filename = explode(".", $filename);
            $name = "T_" . $filename[0] . "_" . time() . rand(1, 100) . '.' . $request->fileTranscriptToUpload->extension();
            // $request->plan_file->move(public_path('plan_file'), $name);
            $request->fileTranscriptToUpload->storeAs('public/Transcript', $name);
            $Transcript_file_name = $name;

        }
        $uid = Auth::user()->id;
        $id = IdGenerator::generate(['table' => 'apprenties', 'length' => 7, 'prefix' => date('ym'), 'reset_on_prefix_change' => true]);
        $appliance = Apprenty::insert([
            'id' => $id,
            'user_id' => $uid,
            'agency_id' => $request['Agency'],
            'year' => $request['year'],
            'level' => $request['level'],
            'startday' => $request['startday'],
            'lastday' => $request['lastday'],
            'Profile' => $Profile_file_name,
            'Transcript' => $Transcript_file_name,
            'Permission' => $Permission_file_name,
            'send_to' => $request['boss'],
            'sent' => $request['sent'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);
         // You can set a success message
    $message = 'Form submitted successfully!';

    // Return a response with the message
    return response()->json(['message' => $message]);
    }
}