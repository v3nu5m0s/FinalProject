@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="jumbotron text-center bg-primary text-white py-5">
        @if(auth()->user()->userLevel == 0)
            <h1 class="display-4">Welcome to the Manager Dashboard</h1>
        @else
            <h1 class="display-4">Welcome to the Developer Dashboard</h1>
        @endif
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-between">
                        <h5 class="card-title">Business Units</h5>
                        @if(auth()->user()->userLevel == 0)
                            <p class="card-text">Manage your business units and system owners.</p>
                        @else
                            <p class="card-text text-center">Explore Business Unit.</p>
                        @endif
                        <a href="{{ route('business-units.index') }}" class="btn btn-primary mt-3">View</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-between">
                        <h5 class="card-title">Projects</h5>
                        @if(auth()->user()->userLevel == 0)
                            <p class="card-text text-center">Track project information, development methodology, and deployment details.</p>
                        @else
                            <p class="card-text text-center">Track and Update Project Information.</p>
                        @endif
                        <a href="{{ route('projects.index') }}" class="btn btn-primary mt-3">View</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-between">
                        <h5 class="card-title">Developers</h5>
                        @if(auth()->user()->userLevel == 0)
                            <p class="card-text text-center">Manage your lead developers.</p>
                        @else
                            <p class="card-text text-center">Explore Developer Profile.</p>
                        @endif
                        <a href="{{ route('developers.index') }}" class="btn btn-primary mt-3">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
