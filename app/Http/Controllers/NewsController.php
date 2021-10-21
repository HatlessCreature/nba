<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Team;



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

    public function getTeamNews(Team $team)
    {
        // $posts = $author->posts->where('is_published', true);
        // ovaj nacin bi dao sve iz baze, pa nam onda u ram-u odvojio published ^

        $articles = $team->articles()->with('user')->where('team_id', $team->id)->paginate(15);
        return view('news.index', compact('articles'));
    }
}
