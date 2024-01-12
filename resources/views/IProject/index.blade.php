<!-- resources/views/projects/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Projects</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>System Owner</th>
                <th>System PIC</th>
                <th>Start Date</th>
                <th>Duration</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Lead Developer</th>
                <!-- Add more columns as needed -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->system_owner }}</td>
                    <td>{{ $project->system_pic }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->duration }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td>{{ $project->status }}</td>
                    <td>{{ $project->lead_developer ? $project->lead_developer->name : '-' }}</td>
                    <!-- Display more columns as needed -->
                    <td>
                        <a href="{{ route('iproject.show', $project->id) }}">View</a>
                        <a href="{{ route('iproject.edit', $project->id) }}">Edit</a>
                        <!-- Add a delete button if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
