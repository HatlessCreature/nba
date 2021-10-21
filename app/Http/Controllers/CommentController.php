<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Team;
use App\Comment;



class CommentController extends Controller
{
    public function store(Team $team, CommentRequest $request)

    {
        $data = $request->validated();
        $data1 = ["team_id" => $team->id, "user_id" => Auth::id()];
        // $team->comments()->create($data);
        $comment = Comment::create(array_merge($data, $data1));

        return back();
    }
}
