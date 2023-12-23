<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\V1\ArticleResource;
use App\Http\Resources\V1\ArticleCollection;
use App\Models\Article;
use Illuminate\Http\Request;

use App\Filters\V1\ArticleFilter;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ArticleFilter();
        $filterItems = $filter->transform($request);

        $includeCategory = $request->query('includeCategory');

        $articles = Article::where($filterItems);

        if($includeCategory){
            $articles = $articles->with('categorie');
        }
            return new ArticleCollection($articles->paginate() ->appends($request->query()));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validatedData = $request->validated();
        // return new ArticleResource(Article::created($request->all()));
        // ddd($validatedData);

        return new ArticleResource(Article::create([
            'libelle' => $request->designation,
            'categorie_id' => $request->category,
        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {

        $includeCategory = request()->query('includeCategory');

        if($includeCategory){
        return new ArticleResource($article->loadMissing('categorie'));

        }


        return new ArticleResource($article);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        return $article->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
