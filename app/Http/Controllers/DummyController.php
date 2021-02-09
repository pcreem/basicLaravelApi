<?php

namespace App\Http\Controllers;

use App\Models\dummy;
use Illuminate\Http\Request;

class DummyController extends Controller
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
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function show(dummy $dummy)
    {
        return dummy::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function edit(dummy $dummy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dummy $dummy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function destroy(dummy $dummy)
    {
        //
    }
}
