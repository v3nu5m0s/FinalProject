@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Update Developer</h2>

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
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="form-group">
                <label for="name">Developer Name:</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $developer->name) }}" required>
            </div>

            <div class="form-group">
                <label for="dev_id">Developer ID:</label>
                <input type="text" name="dev_id" id="dev_id" class="form-control" 
                    value="{{ old('dev_id', $developer->dev_id) }}" required>
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary my-3">Update</button>
            <a href="{{ route('developers.index') }}" class="btn btn-secondary  my-3">Back</a>
        </form>
    </div>
@endsection
