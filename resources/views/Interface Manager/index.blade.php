<!-- resources/views/managers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Managers</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($managers as $manager)
                    <tr>
                        <td>{{ $manager->id }}</td>
                        <td>{{ $manager->name }}</td>
                        <td>
                            <a href="{{ route('managers.show', $manager->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-primary">Edit</a>
                            <!-- Add a delete button if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection