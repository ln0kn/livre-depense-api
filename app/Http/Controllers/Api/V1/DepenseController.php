<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\DepenseFilter;
use App\Filters\V1\Depenseilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepenseRequest;
use App\Http\Requests\UpdateDepenseRequest;
use App\Http\Resources\V1\DepenseResource;
use App\Http\Resources\V1\DepenseCollection;
use App\Models\Depense;
use Illuminate\Http\Request;
class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new DepenseFilter();
        
        $queryItems = $filter->transform($request);
        // dd($queryItems);

        if(count($queryItems) == 0){
            return new DepenseCollection(Depense::paginate());
        }else{
            $charge = Depense::where($queryItems)->paginate();
            return new DepenseCollection($charge->appends($request->query()));
        }   
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
    public function store(StoreDepenseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Depense $depense)
    {
        return new DepenseResource($depense);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepenseRequest $request, Depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depense $depense)
    {
        //
    }
}
