@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card my-5 shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Update Developer</h2>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('developers.update', $developer->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Developer Name:</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $developer->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="dev_id" class="form-label">Developer ID:</label>
                        <input type="text" name="dev_id" id="dev_id" class="form-control" 
                            value="{{ old('dev_id', $developer->dev_id) }}" required>
                    </div>

                    <!-- Add other fields as needed -->

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <a href="{{ route('developers.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
