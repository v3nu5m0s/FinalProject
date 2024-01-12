@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Update Progress Report</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('progress-reports.update', $progressReport->id) }}">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="form-group">
                <label for="date">Date of Progress:</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $progressReport->date) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Ahead of Schedule" {{ old('status', $progressReport->status) === 'Ahead of Schedule' ? 'selected' : '' }}>Ahead of Schedule</option>
                    <option value="On Schedule" {{ old('status', $progressReport->status) === 'On Schedule' ? 'selected' : '' }}>On Schedule</option>
                    <option value="Delayed" {{ old('status', $progressReport->status) === 'Delayed' ? 'selected' : '' }}>Delayed</option>
                    <option value="Completed" {{ old('status', $progressReport->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Development Overview:</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $progressReport->description) }}</textarea>
            </div>

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('progress-reports.index') }}" class="btn btn-secondary mb-3">Back</a>
    </div>
@endsection