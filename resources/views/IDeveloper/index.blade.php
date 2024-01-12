<!-- resources/views/developers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Developers</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Skills</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($developers as $developer)
                <tr>
                    <td>{{ $developer->id }}</td>
                    <td>{{ $developer->name }}</td>
                    <td>{{ $developer->email }}</td>
                    <td>{{ $developer->phone }}</td>
                    <td>{{ $developer->skills }}</td>
                    <td>
                        <a href="{{ route('developers.show', $developer->id) }}">View</a>
                        <a href="{{ route('developers.edit', $developer->id) }}">Edit</a>
                        <!-- Add a delete button if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
