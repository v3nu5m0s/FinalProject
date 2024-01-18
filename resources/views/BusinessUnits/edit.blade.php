@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Update Business Unit</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('business-units.update', $businessUnit->id) }}">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="form-group">
                <label for="name">Business Unit Name:</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $businessUnit->name) }}" required>
            </div>

            <div class="form-group">
                <label for="bis_id">Unit ID:</label>
                <input type="text" name="bis_id" id="bis_id" class="form-control"
                value="{{ old('bis_id', $businessUnit->bis_id) }}" required>
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary my-3">Update</button>
            <a href="{{ route('business-units.index') }}" class="btn btn-secondary my-3">Back</a>
        </form>

    </div>
@endsection
