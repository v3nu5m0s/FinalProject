@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lead Developer</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('developers.create') }}" class="btn btn-primary mb-3">Create</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Dev ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @php($i=1)
                @foreach($developers as $developer)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $developer->dev_id }}</td>
                        <td>{{ $developer->name }}</td>
                        <td>
                            <a href="{{ route('developers.show', $developer->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('developers.edit', $developer->id) }}" class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this developer?')">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
@endsection