@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Update Project</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="form-group">
                <label for="business_unit_id">Business Unit:</label>
                <select name="business_unit_id" id="business_unit_id" class="form-control" required>
                    <!-- Populate the dropdown with business units -->
                    @foreach ($businessUnits as $businessUnit)
                        <option value="{{ $businessUnit->id }}"
                            {{ $project->business_unit_id == $businessUnit->id ? 'selected' : '' }}>
                            {{ $businessUnit->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Project Name:</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $project->name) }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" id="status" class="form-control"
                    value="{{ old('status', $project->status) }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">Project Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control"
                    value="{{ old('start_date', $project->start_date) }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">Project End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control"
                    value="{{ old('end_date', $project->end_date) }}" required>
            </div>

            <div class="form-group">
                <label for="duration">Project Duration (in days):</label>
                <input type="number" name="duration" id="duration" class="form-control"
                    value="{{ old('duration', $project->duration) }}" required>
            </div>


            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-3">Back</a>
    </div>
@endsection
