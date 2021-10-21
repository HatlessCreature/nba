@extends('layouts.app')

@section('title', 'News')

@section('content')
<h1>News</h1>
<ul>
    @foreach($articles as $article)
    <li>
        <a href="{{route('article', ['article' => $article->id])}}">
            {{$article->id}} {{$article->title}}
        </a> - {{ $article->user->name }}
    </li>
    @endforeach
</ul>
{{ $articles->links() }}
@endsection