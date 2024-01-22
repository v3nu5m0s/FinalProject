@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Lead Developers</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(auth()->user()->userLevel == 0)
            <a href="{{ route('developers.create') }}" class="btn btn-primary mb-3">Create</a>
        @endif

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
                @forelse($developers as $developer)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $developer->dev_id }}</td>
                        <td>{{ $developer->name }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('developers.show', $developer->id) }}" class="btn btn-info btn-sm">Show</a>
                                @if(auth()->user()->userLevel == 0)
                                    <a href="{{ route('developers.edit', $developer->id) }}" class="btn btn-warning btn-sm">Update</a>
                                    <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this developer?')">Remove</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No lead developers available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
            @if(auth()->user()->userLevel == 0)
                <a href="{{ route('developers.deleted') }}" class="btn btn-secondary">View Deleted Projects</a>
            @endif
        </div>
    </div>
@endsection
