<!-- resources/views/developers/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Developer</h1>

    <form action="{{ route('developers.store') }}" method="post">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone">

        <label for="skills">Skills:</label>
        <input type="text" id="skills" name="skills">

        <!-- Add more fields as needed -->

        <button type="submit">Create Developer</button>
    </form>
@endsection
