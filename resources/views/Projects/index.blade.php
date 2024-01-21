@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Projects</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(auth()->user()->userLevel == 0)
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create Your Project</a>
        @endif

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
                @forelse($projects as $project)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->system_platform }}</td>
                        <td>{{ $project->updated_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                @if(auth()->user()->userLevel == 0)
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">Show</a>
                                @endif
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Update</a>
                                @if(auth()->user()->userLevel == 0)
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this project?')">Remove</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No projects available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
            @if(auth()->user()->userLevel == 0)
                <a href="{{ route('projects.deleted') }}" class="btn btn-secondary">View Deleted Projects</a>
            @endif
        </div>
    </div>
@endsection
