<!-- resources/views/businessunits/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Business Unit</h1>

    <form action="{{ route('businessunits.update', $businessUnit->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <label for="name">Business Unit Name:</label>
        <input type="text" id="name" name="name" value="{{ $businessUnit->name }}" required>

        <label for="manager">Business Unit Manager:</label>
        <select id="manager" name="manager">
            @foreach ($managers as $manager)
                <option value="{{ $manager->id }}" {{ $businessUnit->manager_id == $manager->id ? 'selected' : '' }}>
                    {{ $manager->name }}
                </option>
            @endforeach
        </select>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="{{ $businessUnit->location }}">

        <label for="contact_person">Contact Person:</label>
        <input type="text" id="contact_person" name="contact_person" value="{{ $businessUnit->contact_person }}">

        <!-- Additional fields for your assignment -->
        <label for="system_request">System Request (New/Existing):</label>
        <select id="system_request" name="system_request">
            <option value="new" {{ $businessUnit->system_request == 'new' ? 'selected' : '' }}>New</option>
            <option value="existing" {{ $businessUnit->system_request == 'existing' ? 'selected' : '' }}>Existing</option>
        </select>

        <!-- Add more fields as needed -->

        <button type="submit">Update Business Unit</button>
    </form>
    
    <br>

    <a href="{{ route('businessunits.show', $businessUnit->id) }}">Cancel</a>
@endsection
