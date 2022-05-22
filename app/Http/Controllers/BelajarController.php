<?php

namespace App\Http\Controllers;

use App\Models\Belajar;
use App\Http\Requests\StoreBelajarRequest;
use App\Http\Requests\UpdateBelajarRequest;

class BelajarController extends Controller
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
     * @param  \App\Http\Requests\StoreBelajarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBelajarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Belajar  $belajar
     * @return \Illuminate\Http\Response
     */
    public function show(Belajar $belajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Belajar  $belajar
     * @return \Illuminate\Http\Response
     */
    public function edit(Belajar $belajar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBelajarRequest  $request
     * @param  \App\Models\Belajar  $belajar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBelajarRequest $request, Belajar $belajar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Belajar  $belajar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Belajar $belajar)
    {
        //
    }
}
