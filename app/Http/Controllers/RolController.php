<?php

namespace App\Http\Controllers;

use App\Models\rol;
use App\Http\Requests\StorerolRequest;
use App\Http\Requests\UpdaterolRequest;

class RolController extends Controller
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
     * @param  \App\Http\Requests\StorerolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterolRequest  $request
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterolRequest $request, rol $rol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(rol $rol)
    {
        //
    }
}
