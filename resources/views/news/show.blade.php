@extends('layouts.app')

@section('title', $article->title)

@section('content')
<h2>
    {{ $article->title  }}
</h2>
<h5>
    {{ $article->content  }}
</h5>
<p>
    By: {{ $article->user->name  }}
</p>
<div>
    @foreach($article->teams as $team)
    <span style="
        padding: 5px; 
        border-radius: 15px;">
        <a href="{{route('teamNews', ['team' => $team->id])}}">
            {{ $team->name }}
        </a>
    </span>
    @endforeach
</div>

@endsection