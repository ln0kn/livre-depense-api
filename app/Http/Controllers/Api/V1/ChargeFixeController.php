<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\ChargeFixeFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChargeFixeRequest;
use App\Http\Requests\UpdateChargeFixeRequest;
use App\Http\Resources\V1\ChargeUtileCollection;
use App\Http\Resources\V1\ChargeUtileResource;
use App\Models\ChargeFixe;
use Illuminate\Http\Request;

class ChargeFixeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request  $request)
    { 
        $filter = new ChargeFixeFilter();
        $filterItems = $filter->transform($request);

        $includeArticle = $request->query('includeArticle');

        $articles = ChargeFixe::where($filterItems);

        if($includeArticle){
            $articles = $articles->with('article');
        }
            return new ChargeUtileCollection($articles->paginate() ->appends($request->query()));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChargeFixeRequest $request)
    {
        
    
        $validatedData = $request->validated();

        return new ChargeUtileResource(ChargeFixe::create([
            'periodisite' => $request->frequence,
            'article_id' => $request->article,
            'montant' => $request->montant,
            'quantite' => $request->quantite,
        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(ChargeFixe $chargeFixe)
    {

        $includeArticle = request()->query('includeArticle');

        if($includeArticle){
        return new ChargeUtileResource($chargeFixe->loadMissing('article'));

        }


        return new ChargeUtileResource($chargeFixe);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChargeFixeRequest $request, ChargeFixe $chargeFixe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChargeFixe $chargeFixe)
    {
        //
    }
}
