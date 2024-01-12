<!-- resources/views/developers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Developer</h1>

    <form action="{{ route('developers.update', $developer->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $developer->name }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $developer->email }}" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="{{ $developer->phone }}">

        <label for="skill">Skill:</label>
        <input type="text" id="skill" name="skill" value="{{ $developer->skill }}">

        <!-- Additional fields for your assignment -->
        <label for="experience">Experience (years):</label>
        <input type="number" id="experience" name="experience" value="{{ $developer->experience }}">

        <label for="github_profile">GitHub Profile:</label>
        <input type="text" id="github_profile" name="github_profile" value="{{ $developer->github_profile }}">

        <label for="preferred_language">Preferred Language:</label>
        <input type="text" id="preferred_language" name="preferred_language" value="{{ $developer->preferred_language }}">

        <label for="current_project">Current Project:</label>
        <input type="text" id="current_project" name="current_project" value="{{ $developer->current_project }}">

        <label for="task_completion">Task Completion (%):</label>
        <input type="number" id="task_completion" name="task_completion" value="{{ $developer->task_completion }}">

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="active" {{ $developer->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="on_leave" {{ $developer->status == 'on_leave' ? 'selected' : '' }}>On Leave</option>
            <option value="inactive" {{ $developer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>

        <!-- Add more fields as needed -->

        <button type="submit">Update Developer</button>
    </form>
    
    <br>

    <a href="{{ route('developers.show', $developer->id) }}">Cancel</a>
@endsection
