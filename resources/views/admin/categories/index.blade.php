@extends('layouts.admin')

@section('content')

<div class="mt-3">
    @include('partials.session_message')
    <!-- @include('partials.errors') -->
</div>

<div class="container">
    
    <h1 class="px-5 py-3 mx-4">All Categories</h1>
    <div class="row">
        <div class="col">
            <form action="" method="post" class="d-flex align-items-center">
                @csrf
                <div class="input-group mb-3 d-flex">
                    <input id="name" class="form-control" type="text" name="name" placeholder="fullstack" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" id="button-addon2" type="submit">Add</button>
                </div>
            </form>
        </div>
        <div class="col">

            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Posts Count</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>
                            <form id="category-{{$category->id}}" action="{{route('admin.categories.update', $category->slug)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input class="border-0 bg-secondary bg-transparent" type="text" name="name" value="{{$category->name}}">
                            </form>
                        </td>
                        <td>{{$category->slug}}</td>
                        <td><span class="badge badge-info bg-dark text-light p-2">{{count($category->posts)}}</span></td>
                        <td>
                            <button form="category-{{$category->id}}" type="submit" class="btn btn-primary  btn-sm mb-2">Update</button>
                            <form action="{{route('admin.categories.destroy', $category->slug)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td>No categories! Add your first category.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>

@endsection