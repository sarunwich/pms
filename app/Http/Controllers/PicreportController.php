<?php

namespace App\Http\Controllers;

use App\Models\Picreport;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PicreportController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picreport  $picreport
     * @return \Illuminate\Http\Response
     */
    public function show(Picreport $picreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picreport  $picreport
     * @return \Illuminate\Http\Response
     */
    public function edit(Picreport $picreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picreport  $picreport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picreport $picreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Picreport  $picreport
     * @return \Illuminate\Http\Response
     */
    public function destroy($picreport)
    {
        //
        Picreport::where('id', $picreport)->delete();
        return redirect()->route('Internship.edit')->with('success', ' deleted successfully.');
    }
    public function addpic(Request $request)
    {
        //
        if ($request->hasfile('picdetail')) {
          
                $filename = $request->file("picdetail")->getClientOriginalName();
                $filename = explode(".", $filename);
                $name = "P_" . $request->reportstd_id . $filename[0] . "_" . time() . rand(1, 100) . '.' . $request->picdetail->extension();
                // $attachmentPdfName->move(public_path('attachmentPdf'), $name);
                $request->picdetail->storeAs('public/picdetail', $name);
                //$attachmentPdfName->storeAs('attachmentPdf', $name);
                 
                $picid = IdGenerator::generate(['table' => 'picreports', 'length' => 7, 'prefix' => date('y'), 'reset_on_prefix_change' => true]);
                $Picreport = Picreport::insert([
                    'id' => $picid,
                    'reportstd_id' => $request->reportstd_id,
                    'picname' => $name,
                    'pictile' => $request->pictile,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            
        }
        
    return redirect('/Internship-edit')->with('success', 'Data updated successfully');
    }
}
