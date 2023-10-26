<?php

namespace App\Http\Controllers;

use App\Models\Reportstd;
use App\Models\Picreport;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class ReportstdController extends Controller
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
        $validatedData = $request->validate([

            'date_add' => 'required|date',
            'Details' => 'required',
            'picdetail.*' => 'sometimes|required|mimes:jpeg,png,jpg|max:8192',
            'textin.*' => 'sometimes|required',


        ], [
            'picdetail.*.max' => 'ขนาดไฟล์ ไม่เกิน 8 MB',
            'picdetail.*.mimes' => 'นามสกุลไฟล์ jpeg,png,jpg',
        ]);
        $uid = Auth::user()->id;
        $reportid = IdGenerator::generate(['table' => 'reportstds', 'length' => 7, 'prefix' => date('y'), 'reset_on_prefix_change' => true]);
        $agency = Reportstd::insert([
            'id' => $reportid,
            'user_id' => $uid,
            'detail' => $request['Details'],
            'date_add' => $request['date_add'],
            'note' => $request['note'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);
        if ($request->hasfile('picdetail')) {
            foreach ($request->file('picdetail') as $key => $picdetail) {
                $filename = $request->file("picdetail.$key")->getClientOriginalName();
                $filename = explode(".", $filename);
                $name = "P_" . $reportid . $filename[0] . "_" . time() . rand(1, 100) . '.' . $picdetail->extension();
                // $attachmentPdfName->move(public_path('attachmentPdf'), $name);
                $picdetail->storeAs('public/picdetail', $name);
                //$attachmentPdfName->storeAs('attachmentPdf', $name);
                // $attachmentPdfNames[] = $name;
                $picid = IdGenerator::generate(['table' => 'picreports', 'length' => 7, 'prefix' => date('y'), 'reset_on_prefix_change' => true]);
                $Picreport = Picreport::insert([
                    'id' => $picid,
                    'reportstd_id' => $reportid,
                    'picname' => $name,
                    'pictile' => $request->textin[$key],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
        $picid = IdGenerator::generate(['table' => 'picreports', 'length' => 7, 'prefix' => date('y'), 'reset_on_prefix_change' => true]);
        // $Picreport=Picreport::insert([

        // ]);
        $message = 'add successfully!';
        return response()->json(['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reportstd  $reportstd
     * @return \Illuminate\Http\Response
     */
    public function show(Reportstd $reportstd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reportstd  $reportstd
     * @return \Illuminate\Http\Response
     */
    public function edit(Reportstd $reportstd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reportstd  $reportstd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reportstd $reportstd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reportstd  $reportstd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reportstd $reportstd)
    {
        //
    }
}
