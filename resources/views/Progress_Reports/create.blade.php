@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Let's Create the Project Status</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('progress-reports.store') }}">
            @csrf

            <div class="form-group">
                <label for="date">Date of Progress:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="On Hold">On Hold</option>
                    <option value="Under Budget">Under Budget</option>
                    <option value="Over Budget">Over Budget</option>
                    <option value="On Schedule">On Schedule</option>
                    <option value="Delayed">Delayed</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Development Overview:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary mt-3">Create</button>

            <button type="button" onclick="window.history.back()" class="btn btn-secondary mt-3">Back</button>
        </form>
    </div>
@endsection
