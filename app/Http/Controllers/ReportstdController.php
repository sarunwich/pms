<?php

namespace App\Http\Controllers;

use App\Models\Reportstd;
use Illuminate\Http\Request;

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
            
            'date_add'=> 'required',
            'detail'=> 'required',
            
           
        ]);

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
