<!-- resources/views/businessunits/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Business Unit Details</h1>

    <p>ID: {{ $businessUnit->id }}</p>
    <p>Name: {{ $businessUnit->name }}</p>
    <p>Manager: {{ $businessUnit->manager_name }}</p>
    <p>Location: {{ $businessUnit->location }}</p>
    <p>Description: {{ $businessUnit->description }}</p>

    <!-- Add more details as needed -->

    <a href="{{ route('businessunit.edit', $businessUnit->id) }}">Edit Business Unit</a>
    <!-- Add a delete button if needed -->
@endsection
