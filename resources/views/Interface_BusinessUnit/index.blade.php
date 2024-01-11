<!-- resources/views/businessunits/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Business Units</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Manager</th>
                <th>Projects Count</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($businessUnits as $businessUnit)
                <tr>
                    <td>{{ $businessUnit->id }}</td>
                    <td>{{ $businessUnit->name }}</td>
                    <td>{{ $businessUnit->description }}</td>
                    <td>{{ $businessUnit->manager->name ?? 'N/A' }}</td>
                    <td>{{ $businessUnit->projects->count() }}</td>
                    <td>{{ $businessUnit->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('businessunits.show', $businessUnit->id) }}">View</a>
                        <a href="{{ route('businessunits.edit', $businessUnit->id) }}">Edit</a>
                        <!-- Add a delete button if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
