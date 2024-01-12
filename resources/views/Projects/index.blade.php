@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Project</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Business Unit</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>Duration</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->businessUnit->name }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->duration }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this project?')">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
@endsection
