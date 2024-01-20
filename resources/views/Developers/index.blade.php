@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Lead Developers</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('developers.create') }}" class="btn btn-primary mb-3">Create</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
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
                            <div class="btn-group" role="group">
                                <a href="{{ route('developers.show', $developer->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('developers.edit', $developer->id) }}" class="btn btn-warning btn-sm">Update</a>
                                <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this developer?')">Remove</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
    </div>
@endsection
