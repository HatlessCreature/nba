<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;


class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(20);

        return view('news.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $article->load(['user']);
        return view('news.show', compact('article'));
    }
}
