<!-- resources/views/projects/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Project</h1>

    <form action="{{ route('iproject.store') }}" method="post">
        @csrf
        <label for="system_owner">System Owner:</label>
        <input type="text" id="system_owner" name="system_owner" required>

        <label for="system_pic">System PIC:</label>
        <input type="text" id="system_pic" name="system_pic" required>

        <label for="start_date">Project Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="duration">Project Duration (in days):</label>
        <input type="number" id="duration" name="duration" required>

        <label for="end_date">Project End Date:</label>
        <input type="date" id="end_date" name="end_date" required>

        <label for="status">Project Status:</label>
        <select id="status" name="status">
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
            <option value="delayed">Delayed</option>
        </select>

        <label for="lead_developer">Lead Developer:</label>
        <input type="text" id="lead_developer" name="lead_developer" required>

        <label for="developers">Other Developers (comma-separated):</label>
        <input type="text" id="developers" name="developers">

        <label for="methodology">Development Methodology:</label>
        <input type="text" id="methodology" name="methodology" required>

        <label for="platform">System Platform:</label>
        <select id="platform" name="platform">
            <option value="web-based">Web-based</option>
            <option value="mobile">Mobile</option>
            <option value="stand-alone">Stand-alone</option>
        </select>

        <label for="deployment_type">Project Deployment Type:</label>
        <select id="deployment_type" name="deployment_type">
            <option value="cloud">Cloud</option>
            <option value="on-premises">On-premises</option>
        </select>

        <button type="submit">Create Project</button>
    </form>
@endsection
