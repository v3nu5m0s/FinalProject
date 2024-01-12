<!-- resources/views/projects/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Project</h1>

    <form action="{{ route('iproject.update', $project->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <label for="system_owner">System Owner:</label>
        <input type="text" id="system_owner" name="system_owner" value="{{ $project->system_owner }}" required>

        <label for="system_pic">System PIC:</label>
        <input type="text" id="system_pic" name="system_pic" value="{{ $project->system_pic }}" required>

        <label for="start_date">Project Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="{{ $project->start_date }}" required>

        <label for="duration">Project Duration (days):</label>
        <input type="number" id="duration" name="duration" value="{{ $project->duration }}" required>

        <label for="end_date">Project End Date:</label>
        <input type="date" id="end_date" name="end_date" value="{{ $project->end_date }}" required>

        <label for="status">Project Status:</label>
        <select id="status" name="status">
            <option value="ahead_of_schedule" {{ $project->status == 'ahead_of_schedule' ? 'selected' : '' }}>Ahead of Schedule</option>
            <option value="on_schedule" {{ $project->status == 'on_schedule' ? 'selected' : '' }}>On Schedule</option>
            <option value="delayed" {{ $project->status == 'delayed' ? 'selected' : '' }}>Delayed</option>
            <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <label for="lead_developer">Lead Developer:</label>
        <input type="text" id="lead_developer" name="lead_developer" value="{{ $project->lead_developer }}" required>

        <label for="developers">Developers:</label>
        <input type="text" id="developers" name="developers" value="{{ $project->developers }}" required>

        <label for="methodology">Development Methodology:</label>
        <input type="text" id="methodology" name="methodology" value="{{ $project->methodology }}" required>

        <label for="platform">System Platform:</label>
        <input type="text" id="platform" name="platform" value="{{ $project->platform }}" required>

        <label for="deployment_type">Project Deployment Type:</label>
        <select id="deployment_type" name="deployment_type">
            <option value="cloud" {{ $project->deployment_type == 'cloud' ? 'selected' : '' }}>Cloud</option>
            <option value="on_premises" {{ $project->deployment_type == 'on_premises' ? 'selected' : '' }}>On-Premises</option>
        </select>

        <button type="submit">Update Project</button>
    </form>
    
    <br>

    <a href="{{ route('iproject.show', $project->id) }}">Cancel</a>
@endsection
