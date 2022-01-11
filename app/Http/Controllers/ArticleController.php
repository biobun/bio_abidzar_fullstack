<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\DataTables\ArticlesDataTable;
use App\Models\Article;
use Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArticlesDataTable $dataTable)
    {
        return $dataTable->render('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        return view('articles.form', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article();

        $article->title = $request->title;
        $article->content = $request->content;
        $article->image = $request->image->store(Article::STORAGE_PATH);

        $article->save();

        return redirect()
            ->route('article.index')
            ->with('alert-success', "Article {$article->title} has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $page = Article::all();
        return Response::json(
            array(
                'status' => 'success',
                'pages' => $page->toArray()
            ),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.form', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $oldImage = $article->image;

        $article->title = $request->title;
        $article->content = $request->content;
        $article->image = $request->image->store(Article::STORAGE_PATH);
        $article->update();

        Storage::delete($oldImage);

        return redirect()
            ->route('article.index')
            ->with('alert-success', "Article {$article->title} has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $oldImage = $article->image;

        $article->delete();

        Storage::delete($oldImage);

        return redirect()
            ->route('article.index')
            ->with('alert-success', "Article {$article->title} has been deleted");
    }
}
