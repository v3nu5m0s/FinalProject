@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Business Units</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(auth()->user()->userLevel == 0)
        <a href="{{ route('business-units.create') }}" class="btn btn-primary mb-3">Create</a>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Unit ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php($i=1)
            @forelse($businessUnits as $businessUnit)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $businessUnit->bis_id }}</td>
                    <td>{{ $businessUnit->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('business-units.show', $businessUnit->id) }}" class="btn btn-info btn-sm">Show</a>
                            
                            @if(auth()->user()->userLevel == 0)
                                <a href="{{ route('business-units.edit', $businessUnit->id) }}" class="btn btn-warning btn-sm">Update</a>

                                <form action="{{ route('business-units.destroy', $businessUnit->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Proceed with removing this business unit?')">Remove</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No business units available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
</div>
@endsection
