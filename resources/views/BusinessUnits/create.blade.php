<div>
    <!-- expl: create a view file for BusinessUnits.create -->
</div>

@extends('layouts.app')  <!-- Assuming you have a layout file, adjust as needed -->

@section('content')
    <div class="container">
        <h2>Let's establish your Business Unit</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('business-units.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Business Unit Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Create</button>

            <button type="button" onclick="window.history.back()" class="btn btn-secondary">Back</button>
        </form>
    </div>
@endsection
