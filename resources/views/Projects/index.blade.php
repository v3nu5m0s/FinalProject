@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Projects</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create Your Project</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Project Name</th>
                    <th>Status</th>
                    <th>Duration</th>
                    <th>System Platform</th>
                    <th>Development Methodology</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->duration }}</td>
                        <td>{{ $project->system_platform }}</td>
                        <td>{{ $project->development_methodology }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Update</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this project?')">Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
@endsection
