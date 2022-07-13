@extends('layouts.admin')

@section('content')

<div class="mt-4">
    <h2>Edit - {{$post->title}}</h2>
    @include('partials.errors')

    <form action="{{route('admin.posts.update', $post->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-goup">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"  placeholder="Learn php article" aria-describedby="titleHelper" value="{{old('title', $post->title)}}">
            <small id="titleHelper" class="text-muted">Type the post title, max 150 characters</small>
        </div>

        <div class="d-flex my-4">
            <div class="media mr-4">
                <img width="180" class="shadow" src="{{$post->cover_image}}" alt="{{$post->title}}">
            </div>
            <div class="form-goup">
                <label for="cover_image">Cover Image</label>
                <input type="text" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" placeholder="Learn php article" aria-describedby="cover_imageHelper" value="{{old('cover_image', $post->cover_image)}}">
                <small id="cover_imgHelper" class="text-muted">Type the post cover image</small>
            </div>
        </div>

        <div class="form-group">
            <label for="category_id">Categories</label>
            <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category->id)  ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="4">{{old('content', $post->content)}}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary ">Add Post</button>

    </form>
</div>

@endsection