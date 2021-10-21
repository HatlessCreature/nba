@extends('layouts.app')

@section('title', $article->title)

@section('content')
<h2>
    {{ $article->content  }}
</h2>
<p>
    {{ $article->user->name  }}
</p>


@endsection