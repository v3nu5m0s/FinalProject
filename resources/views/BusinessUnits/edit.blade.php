@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card my-5 shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">Update Business Unit</h2>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('business-units.update', $businessUnit->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Business Unit Name:</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $businessUnit->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="bis_id" class="form-label">Unit ID:</label>
                        <input type="text" name="bis_id" id="bis_id" class="form-control"
                            value="{{ old('bis_id', $businessUnit->bis_id) }}" required>
                    </div>

                    <!-- Add other fields as needed -->

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Update</button>
                        <a href="{{ route('business-units.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
