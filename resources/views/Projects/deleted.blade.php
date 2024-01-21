@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Deleted Projects</h2>

        @if(count($deletedProjects) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Project Name</th>
                        <th>Deleted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($deletedProjects as $project)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->deleted_at }}</td>
                            <td>
                                <form action="{{ route('projects.restore', $project->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to restore this project?')">Restore</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No deleted projects found.</p>
        @endif

        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Projects</a>
    </div>
@endsection
