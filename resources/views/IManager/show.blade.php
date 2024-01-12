<!-- resources/views/managers/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Manager Details</h1>

    <p>ID: {{ $manager->id }}</p>
    <p>Name: {{ $manager->name }}</p>
    <p>Email: {{ $manager->email }}</p>
    <p>Phone: {{ $manager->phone }}</p>
    <!-- Add more details as needed -->

    <a href="{{ route('managers.edit', $manager->id) }}">Edit Manager</a>

    <!-- Add a delete form if needed -->
    <form action="{{ route('managers.destroy', $manager->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this manager?')">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Manager</button>
    </form>
@endsection
