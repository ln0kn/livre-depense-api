<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\DepenseFilter;
use App\Filters\V1\Depenseilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\BulkStoreDepenseRequest;
use App\Http\Requests\StoreDepenseRequest;
use App\Http\Requests\UpdateDepenseRequest;
use App\Http\Resources\V1\DepenseResource;
use App\Http\Resources\V1\DepenseCollection;
use App\Models\Depense;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;



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

        if (count($queryItems) == 0) {
            return new DepenseCollection(Depense::paginate());
        } else {
            $charge = Depense::where($queryItems)->paginate();
            return new DepenseCollection($charge->appends($request->query()));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepenseRequest $request)
    {

        $validatedData = $request->validated();
        // return new ArticleResource(Article::created($request->all()));
        // ddd($validatedData);
        // print_r($request->article);

        return new DepenseResource(Depense::create([
            'designation' => $request->nom,
            'montant' => $request->montant,
            'quantite' => $request->quantite,
            'article_id' => $request->article,
            'paid_date' => $request->dateAchat,
        ]));
    }



    public function bulkStore(BulkStoreDepenseRequest $request)
    {
        // $bulk = collect($request->all())->map(function ($arr, $key) {
        //     return Arr::except($arr, ['nom', 'article', 'dateAchat']);
        // });

        // Depense::insert($bulk->toArray());






        $bulk = collect($request->all())->map(function ($arr, $key) {
            $arr['designation'] = $arr['nom'] ?? null;
            $arr['paid_date'] = $arr['dateAchat'] ?? null;
            $arr['article_id'] = $arr['article'] ?? null;
            return Arr::except($arr, ['nom', 'article', 'dateAchat']);
        });

        Depense::insert($bulk->toArray());
    }



    /**
     * Display the specified resource.
     */
    public function show(Depense $depense)
    {
        return new DepenseResource($depense);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepenseRequest $request, Depense $depense)
    {
        return $depense->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depense $depense)
    {
        //
    }
}
