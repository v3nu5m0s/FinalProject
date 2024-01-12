@extends('layouts.app')

@section('content')
<div class="container">
        <h2>{{ $businessUnit->name }} Information</h2>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $businessUnit->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $businessUnit->name }}</td>
                </tr>
                <!-- Add other fields as needed -->
            </tbody>
        </table>
        <a href="{{ route('business-units.index') }}" class="btn btn-secondary mb-3">Back</a>
    </div>
    @endsection