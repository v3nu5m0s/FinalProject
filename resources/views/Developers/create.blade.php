@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Let's compose your Lead Developer</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('developers.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Lead Developer Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="dev_id">Developer ID:</label>
                <input type="text" name="dev_id" id="dev_id" class="form-control" value="{{ old('dev_id') }}" required>
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary mt-3">Create</button>

            <button type="button" onclick="window.history.back()" class="btn btn-secondary mt-3">Back</button>
        </form>
    </div>
@endsection
