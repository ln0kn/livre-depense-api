<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConstanteRequest;
use App\Http\Requests\UpdateConstanteRequest;
use App\Http\Resources\V1\ConstanteResource;
use App\Http\Resources\V1\ConstanteCollection;
use App\Models\Constante;

class ConstanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ConstanteCollection(Constante::all());   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConstanteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Constante $constante)
    {
        return new ConstanteResource($constante);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Constante $constante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConstanteRequest $request, Constante $constante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Constante $constante)
    {
        //
    }
}
