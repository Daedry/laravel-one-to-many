@extends('layouts.admin')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-around">
                    <div>{{ __('Dashboard') }}</div>
                    <div>{{ __('You are logged in!') }}</div>
                </div>

                <div class="card-body text-center">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <h4>Admin Home - Page</h4>
                    <a href="{{route('admin.posts.create')}}" class="btn btn-primary mt-2">Create Post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection