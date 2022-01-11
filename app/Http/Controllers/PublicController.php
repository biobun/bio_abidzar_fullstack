<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PublicController extends Controller
{
    public function all()
    {
        $articles = Article::all();

        return view('article', compact('articles'));
    }
    public function show(Article $article)
    {
        return view('show-article', compact('article'));
    }
}
