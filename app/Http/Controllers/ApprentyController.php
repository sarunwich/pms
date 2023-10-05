<?php

namespace App\Http\Controllers;

use App\Models\Apprenty;
use Illuminate\Http\Request;

class ApprentyController extends Controller
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
     * @param  \App\Models\Apprenty  $apprenty
     * @return \Illuminate\Http\Response
     */
    public function show(Apprenty $apprenty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apprenty  $apprenty
     * @return \Illuminate\Http\Response
     */
    public function edit(Apprenty $apprenty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apprenty  $apprenty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apprenty $apprenty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apprenty  $apprenty
     * @return \Illuminate\Http\Response
     */
    public function destroy($apprenty)
    {
        //
          $apprenty = Apprenty::find($apprenty);
//  dd($apprenty);
        // if (!$dapprenty) {
        //     return redirect()->route('Internship.status')->with('error', 'User not found.');
        // }

        // // Delete the user
        
        $apprenty->delete();
        return redirect()->route('Internship.status')->with('status', 'deleted successfully');
    }
}
