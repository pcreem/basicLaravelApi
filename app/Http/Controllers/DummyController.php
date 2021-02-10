<?php

namespace App\Http\Controllers;

use App\Models\dummy;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Res;

class DummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dummy = dummy::get();
        return response(['data' => $dummy], Res::HTTP_OK);
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
        $dummy = dummy::create($request->all());
        $dummy = $dummy->refresh();
        return response($dummy,Res::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function show(dummy $dummy)
    {
        return response($dummy,RES::HTTP_OK);
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
        $dummy->update($request->all());
        return response($dummy,RES::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dummy  $dummy
     * @return \Illuminate\Http\Response
     */
    public function destroy(dummy $dummy)
    {
        $dummy->delete();
        return response(null, RES::HTTP_NO_CONTENT);
    }
}
