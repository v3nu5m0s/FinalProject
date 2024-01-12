@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $developer->name }} Information</h2>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $developer->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $developer->name }}</td>
                </tr>
                <!-- Add other fields as needed -->
            </tbody>
        </table>
        <a href="{{ route('developers.index') }}" class="btn btn-secondary mb-3">Back</a>
    </div>
@endsection