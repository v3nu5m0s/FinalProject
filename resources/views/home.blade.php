@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm rounded-lg">
                <div class="card-header bg-light text-dark"> <!-- Updated class to bg-light for a light background and text-dark for dark text -->
                    {{ __('Welcome to ITMS Dashboard') }}
                </div>

                <div class="card-body bg-white"> <!-- Updated class to bg-white for a white background -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="lead">{{ __('You are logged in!') }}</p>
                    <hr>

                    <!-- Add more welcoming content or features here -->

                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">Current user count: 1,000</p>
                        </div>
                    </div>

                    <!-- Add more cards or widgets as needed -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
