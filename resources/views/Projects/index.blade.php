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
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Status</th>
                    <th>System Platform</th>
                    <th>Last Update</th>
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
                        <td>{{ $project->system_platform }}</td>
                        <td>{{ $project->updated_at }}</td>
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

        <div class="d-flex justify-content-between">
            <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
            <a href="{{ route('projects.deleted') }}" class="btn btn-secondary">View Deleted Projects</a>
        </div>
    </div>
@endsection
