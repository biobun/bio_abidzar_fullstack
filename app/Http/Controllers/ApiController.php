<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllArticle()
    {
        $articles = Article::all()->toJson(JSON_PRETTY_PRINT);
        return response($articles, 200);
    }
    public function show(Article $article)
    {
        return $article;
    }

}
