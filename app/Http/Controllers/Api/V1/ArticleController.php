<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\V1\ArticleResource;
use App\Http\Resources\V1\ArticleCollection;
use App\Models\Article;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response;

use App\Filters\V1\ArticleFilter;
use App\Http\Responses\ApiResponse;
use App\Responses\V1\ApiErrorResponse;
use App\Responses\V1\ApiSuccessResponse;
// use Illuminate\Support\Facades\Response;
use Throwable;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        try {
            // Your logic here
            $data = Article::findOrFail(2);

            return ApiResponse::success($data, 'Request successful');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }


        // try {
        //     $filter = new ArticleFilter();
        //     $filterItems = $filter->transform($request);

        //     $includeCategory = $request->query('includeCategory');

        //     $articles = Article::where($filterItems);

        //     if ($includeCategory) {
        //         $articles = $articles->with('categorie');
        //     }

        //     // return new ApiSuccessResponse(
        //     //     new ArticleCollection($articles->paginate()->appends($request->query())),
        //     //     ['message' => 'User was created successfully'],
        //     //     Response::HTTP_CREATED
        //     // );
        //     $data = new ArticleCollection($articles->paginate()->appends($request->query()));

        //     return ApiResponse::success($data, 'Request successful');
        // } catch (\Exception $e) {
        //     return ApiResponse::error($e->getMessage());
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {








        try {
            // Your logic here
            return new ArticleResource(Article::created($request->all()));
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }







        // $validatedData = $request->validated();
        // // return new ArticleResource(Article::created($request->all()));
        // // ddd($validatedData);

        // return new ArticleResource(Article::create([
        //     'libelle' => $request->designation,
        //     'categorie_id' => $request->category,
        // ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {

        $includeCategory = request()->query('includeCategory');

        if ($includeCategory) {
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
