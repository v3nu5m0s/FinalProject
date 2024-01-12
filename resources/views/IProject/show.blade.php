<!-- resources/views/projects/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Project Details</h1>

    <p>ID: {{ $project->id }}</p>
    <p>System Owner: {{ $project->system_owner }}</p>
    <p>System PIC: {{ $project->system_pic }}</p>
    <p>Project Start Date: {{ $project->start_date }}</p>
    <p>Project Duration: {{ $project->duration }} days</p>
    <p>Project End Date: {{ $project->end_date }}</p>
    <p>Project Status: {{ $project->status }}</p>
    <p>Lead Developer: {{ $project->lead_developer->name }}</p>
    <p>Developers:
        @foreach ($project->developers as $developer)
            {{ $developer->name }},
        @endforeach
    </p>
    <p>Development Methodology: {{ $project->development_methodology }}</p>
    <p>System Platform: {{ $project->system_platform }}</p>
    <p>Project Deployment Type: {{ $project->deployment_type }}</p>

    <!-- Additional Details -->
    <p>Progress Reports:</p>
    <ul>
        @foreach ($project->progressReports as $report)
            <li>
                Date: {{ $report->date }},
                Status: {{ $report->status }},
                Description: {{ $report->description }}
            </li>
        @endforeach
    </ul>

    <p>Other Details:</p>
    <ul>
        <li>Estimated Cost: {{ $project->estimated_cost }}</li>
        <li>Actual Cost: {{ $project->actual_cost }}</li>
        <!-- Add more project details as needed -->
    </ul>

    <!-- Add more details as needed -->

    <a href="{{ route('iproject.edit', $project->id) }}">Edit Project</a>
    <!-- Add a delete button if needed -->
@endsection

