@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">{{ $businessUnit->name }} Information</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $businessUnit->bis_id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $businessUnit->name }}</td>
                    </tr>
                    <!-- Add other fields as needed -->
                </tbody>
            </table>
            <a href="{{ route('business-units.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
