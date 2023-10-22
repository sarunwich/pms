<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Province;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provinces=Province::all();
        $sgencys =Agency::join('provinces','provinces.PROVINCE_ID','=','agencies.province')
        ->join('amphurs','amphurs.AMPHUR_ID','=','agencies.amphur')
        ->join('districts','districts.DISTRICT_ID','=','agencies.district')
        ->select('agencies.*','provinces.PROVINCE_NAME as PROVINCE_NAME','amphurs.AMPHUR_NAME as AMPHUR_NAME','districts.DISTRICT_NAME as DISTRICT_NAME')
        ->orderBy('agencies.id', 'desc')
        ->get();
        return view('users.Agency_index',compact('sgencys','provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provinces=Province::all();
        return view('users.Agency_add',compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'Name'=> 'required',
            'ENName'=> 'required',
            'address'=> 'required',
            'province'=> 'required',
            'amphur'=> 'required',
            'district'=> 'required',
            'postoffice'=>'required|min:5|max:5',
            'phont'=>'required|min:9|max:10',
            'web'=>'required',
            'mail'=>['required', 'string', 'email']
        ]);
        $prefix = date('y')+43; 
        $id = IdGenerator::generate(['table' => 'agencies', 'length' => 7, 'prefix' => $prefix, 'reset_on_prefix_change' => true]);
        $agency = Agency::insert([
            'id' => $id,
            'agenciesTHname' => $request['Name'],
            'agenciesENname' => $request['ENName'],
            'address' => $request['address'],
            'province' => $request['province'],
             'amphur' => (int)$request['amphur'],
            //  'amphur' => 999,
             'district' => (int)$request['district'],
            'poststaion' => $request['postoffice'],
            'tel' => $request['phont'],
            'Email' => $request['mail'],
            'web' => $request['web'],
            'fax' => $request['fax'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);
        if ($agency) {
            // Insert was successful
            $message ="Agency inserted successfully!";
        } else {
            // Insert failed
            $message ="Agency insertion failed.";
        }

        // $message = 'add successfully!';

    // Return a response with the message
    return response()->json(['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        //
    }
    public function dataAjax(Request $request)
    {
    	$data = [];

        if($request->filled('q')){
            $data = Agency::select("agenciesTHname", "id")
                        ->where('agenciesTHname', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }else{
            $data = Agency::all();
        }
    
        return response()->json($data);
    }

}
