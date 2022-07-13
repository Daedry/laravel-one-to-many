@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between py-4">
        <h1>All Posts</h1>
        <div><a href="{{route('admin.posts.create')}}" class="btn btn-primary">Add Post</a></div>
    </div>

    @if(session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <table class="table table-striped table-inverse table-responsive">

        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Content</th>
                <th>Cover Image</th>
                <th>Acrions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->content}}</td>
                <td><img width="180px" src="{{$post->cover_image}}" alt="Cover image {{$post->title}}"></td>
                <td>
                    <a class="btn btn-primary text-white btn-sm" href="{{route('admin.posts.show', $post->id)}}">View</a>
                    <a class="btn btn-secondary text-white btn-sm mt-2" href="{{route('admin.posts.edit', $post->id)}}"> Edit </a>

                    <!-- Button trigger modal -->
                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm my-2">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
    </table>

</div>

@endsection