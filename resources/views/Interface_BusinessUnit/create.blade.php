<!-- resources/views/businessunits/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Business Unit</h1>

    <form action="{{ route('businessunits.store') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <!-- Additional fields for your assignment -->
        <label for="head">Head:</label>
        <input type="text" id="head" name="head" required>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="contact_email">Contact Email:</label>
        <input type="email" id="contact_email" name="contact_email" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone">

        <!-- Add more fields as needed -->

        <button type="submit">Create Business Unit</button>
    </form>
@endsection
