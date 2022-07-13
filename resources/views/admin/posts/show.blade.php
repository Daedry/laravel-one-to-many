@extends('layouts.admin')

@section('content')

<div class="container mt-4 text-center">
    <div class="title">
        <h1>{{$post->title}}</h1>
        <div class="meta_data">
            <strong> Category: </strong>{{$post->category ? $post->category->name : 'Uncategorized'}}
        </div>
    </div>
    <div class="image py-2">
        <img width="600" src="{{$post->cover_image}}" alt="{{$post->title}}">
    </div>
    <div class="text mt-4">
        <p>{{$post->content}}</p>
    </div>
</div>


@endsection