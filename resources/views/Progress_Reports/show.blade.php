@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Project Status Information</h2>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $progressReport->id }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $progressReport->date }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $progressReport->status }}</td>
                </tr>
                <tr>
                    <th>Overview</th>
                    <td>{{ $progressReport->description }}</td>
                </tr>
                <!-- Add other fields as needed -->
            </tbody>
        </table>
        <a href="{{ route('progress-reports.index') }}" class="btn btn-secondary mb-3">Back</a>
    </div>
@endsection
