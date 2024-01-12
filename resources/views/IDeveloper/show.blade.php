<!-- resources/views/developers/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Developer Details</h1>

    <p>ID: {{ $developer->id }}</p>
    <p>Name: {{ $developer->name }}</p>
    <p>Email: {{ $developer->email }}</p>
    <p>Phone: {{ $developer->phone }}</p>
    <p>Skills: {{ $developer->skills }}</p>
    <p>Experience: {{ $developer->experience }}</p>
    <p>GitHub Profile: {{ $developer->github_profile }}</p>
    <p>LinkedIn Profile: {{ $developer->linkedin_profile }}</p>
    <p>Specializations: {{ $developer->specializations }}</p>
    <!-- Add more details as needed -->

    <a href="{{ route('developers.edit', $developer->id) }}">Edit Developer</a>
    <!-- Add a delete button if needed -->
    <br>
    <a href="{{ route('developers.index') }}">Back to Developers List</a>
@endsection
