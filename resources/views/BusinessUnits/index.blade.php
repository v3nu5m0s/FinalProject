@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Business Units</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('business-units.create') }}" class="btn btn-primary mb-3">Create</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Unit ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php($i=1)
            @foreach($businessUnits as $businessUnit)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $businessUnit->bis_id }}</td>
                    <td>{{ $businessUnit->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('business-units.show', $businessUnit->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('business-units.edit', $businessUnit->id) }}" class="btn btn-warning btn-sm">Update</a>
                            <form action="{{ route('business-units.destroy', $businessUnit->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this business unit?')">Remove</button>
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
