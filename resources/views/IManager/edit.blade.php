<!-- resources/views/managers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Manager</h1>

    <form action="{{ route('managers.update', $manager->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $manager->name }}" required>

        <!-- Add more fields as needed -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $manager->email }}" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ $manager->phone }}">

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="{{ $manager->department }}">

        <!-- Add more fields as needed -->

        <button type="submit">Update Manager</button>
    </form>
    
    <br>

    <a href="{{ route('managers.show', $manager->id) }}">Cancel</a>
@endsection
