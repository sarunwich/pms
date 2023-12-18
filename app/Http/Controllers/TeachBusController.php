<?php

namespace App\Http\Controllers;

use App\Models\Teach_bus;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TeachBusController extends Controller
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
            
            'teachID'=> 'required',
            'stdid.*'=> 'required',
            'year'=> 'required',
           
        ]);
        $stdIds = $request->input('stdid');
        foreach($stdIds as $key => $data){
        $prefix = date('y')+43; 
        $id = IdGenerator::generate(['table' => 'teach_buses', 'length' => 7, 'prefix' => $prefix, 'reset_on_prefix_change' => true]);
        $Teach_bus = Teach_bus::insert([
            'id' => $id,
            'teachID' => $request['teachID'],
            'Stdid' => $stdIds[$key],
            'year' => $request['year'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);
    }
    
        if ($Teach_bus) {
            // Insert was successful
            $message =" inserted successfully!";
        } else {
        //     // Insert failed
            $message =" insertion failed.";
        }

        // $message = 'add successfully!';

    // Return a response with the message
    return response()->json(['message' => $message]);
    // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teach_bus  $teach_bus
     * @return \Illuminate\Http\Response
     */
    public function show(Teach_bus $teach_bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teach_bus  $teach_bus
     * @return \Illuminate\Http\Response
     */
    public function edit(Teach_bus $teach_bus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teach_bus  $teach_bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teach_bus $teach_bus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teach_bus  $teach_bus
     * @return \Illuminate\Http\Response
     */
    public function destroy($teach_bus)
    {
        //
         // Logic to delete the record with the given ID
    // Example: 
    Teach_bus::destroy($teach_bus);

    return redirect()->back()->with('status', 'Record deleted successfully.'.$teach_bus);
    }
}
