@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Project Information</h2>

        <table class="table">
            <tbody>
                <tr>
                    <th>Project ID</th>
                    <td>{{ $project->pro_id }}</td>
                </tr>
                <tr>
                    <th>Business Unit</th>
                    <td>
                        @if ($project->businessUnit)
                            {{ $project->businessUnit->bis_id }}
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $project->name }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $project->status }}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>{{ $project->start_date }}</td>
                </tr>
                <tr>
                    <th>Duration</th>
                    <td>{{ $project->duration }}</td>
                </tr>
                <tr>
                    <th>End Date</th>
                    <td>{{ $project->end_date }}</td>
                </tr>
                <!-- Add other fields as needed -->
            </tbody>
        </table>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-3">Back</a>
    </div>
@endsection
