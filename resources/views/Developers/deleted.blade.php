@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Deleted Developers</h2>

        @if(count($deletedDevelopers) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Developer Name</th>
                        <th>Deleted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($deletedDevelopers as $developer)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $developer->name }}</td>
                            <td>{{ $developer->deleted_at }}</td>
                            <td>
                                <form action="{{ route('developers.restore', $developer->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('post') {{-- Add this line to specify the method --}}
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to restore this developer?')">Restore</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No deleted developers found.</p>
        @endif

        <a href="{{ route('developers.index') }}" class="btn btn-secondary">Back to Developers</a>
    </div>
@endsection
