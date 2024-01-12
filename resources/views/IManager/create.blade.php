<!-- resources/views/managers/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Manager</h1>

        <form action="{{ route('managers.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" id="phone" name="phone">
            </div>

            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" class="form-control" id="department" name="department">
            </div>

            <!-- Add more fields as needed -->

            <button type="submit" class="btn btn-primary">Create Manager</button>
        </form>
    </div>
@endsection