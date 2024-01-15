@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Let's Create your Project</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('projects.store') }}">
            @csrf

            <div class="form-group">
                <label for="business_unit_id">Choose your Business Unit:</label>
                <select name="business_unit_id" id="business_unit_id" class="form-control" required>
                    <!-- Populate the dropdown with business units -->
                    @foreach ($businessUnits as $businessUnit)
                        <option value="{{ $businessUnit->id }}">{{ $businessUnit->name }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="form-group">
                <label for="name">Project Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required>
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
                <label for="start_date">Project Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="end_date">Project End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="duration">Project Duration (in days):</label>
                <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration') }}"
                    required>
            </div>



            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary mt-3">Create</button>

            <button type="button" onclick="window.history.back()" class="btn btn-secondary mt-3">Back</button>
        </form>
    </div>
@endsection
