<?php

namespace App\Http\Controllers;

use App\Cooperative;
use Illuminate\Http\Request;

class CooperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Cooperative::get();
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
     * @param  \App\Cooperative  $cooperative
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperative $cooperative)
    {
        //
        return $cooperative;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cooperative  $cooperative
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperative $cooperative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cooperative  $cooperative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cooperative $cooperative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cooperative  $cooperative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperative $cooperative)
    {
        //
    }
}
