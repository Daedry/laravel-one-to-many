@extends('layouts.app')

@section('content')

<div id="app">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} | {{ __('You are logged in!') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <h4 class="text-center">Guest Home - Page</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection