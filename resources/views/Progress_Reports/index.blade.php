@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Project Status</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('progress-reports.create') }}" class="btn btn-primary mb-3">Create</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Progress ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <td>Overview</td>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php($i=1)
                @foreach($progressReports as $progressReport)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $progressReport->id }}</td>
                        <td>{{ $progressReport->date }}</td>
                        <td>{{ $progressReport->status }}</td>
                        <td>{{ $progressReport->description }}</td>
                        <td>
                            <a href="{{ route('progress-reports.show', $progressReport->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('progress-reports.edit', $progressReport->id) }}" class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('progress-reports.destroy', $progressReport->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this progress report?')">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
@endsection