<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateArticleRequest;
use App\Article;
use App\Team;



class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(20);

        return view('news.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $article->load(['user']);
        return view('news.show', compact('article'));
    }

    public function getTeamNews(Team $team)
    {
        $articles = $team->articles()->with('user')->where('team_id', $team->id)->paginate(15);
        return view('news.index', compact('articles'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('news.create', compact('teams'));
    }

    public function store(CreateArticleRequest $request)
    {
        $data = $request->validated();

        $newArticle = Article::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => Auth::user()->id
        ]);
        $newArticle->teams()->attach($data['teams']);

        session()->flash("success", "Thank you for publishing article on www.nba.com");
        return redirect('/news');
    }
}
