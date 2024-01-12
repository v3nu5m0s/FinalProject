@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Business Unit</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('business-units.create') }}" class="btn btn-primary mb-3">Create</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($businessUnits as $businessUnit)
                    <tr>
                        <td>{{ $businessUnit->id }}</td>
                        <td>{{ $businessUnit->name }}</td>
                        <td>
                            <a href="{{ route('business-units.show', $businessUnit->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('business-units.edit', $businessUnit->id) }}" class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('business-units.destroy', $businessUnit->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this business unit?')">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
    @endsection