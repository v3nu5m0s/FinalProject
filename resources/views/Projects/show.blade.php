@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Project Information</h2>
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

                <table class="table table-bordered">
                    <tbody>
                        <!-- Assuming $project is the variable containing project details -->
                        <tr>
                            <th>Project ID</th>
                            <td>{{ $project->pro_id }}</td>
                        </tr>
                        <tr>
                            <th>Project Name</th>
                            <td>{{ $project->name }}</td>
                        </tr>
                        <tr>
                            <th>Project Description</th>
                            <td>{{ $project->description }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $project->status }}</td>
                        </tr>
                        <tr>
                            <th>Start Date</th>
                            <td>{{ $project->start_date }}</td>
                        </tr>
                        <tr>
                            <th>End Date</th>
                            <td>{{ $project->end_date }}</td>
                        </tr>
                        <tr>
                            <th>Duration</th>
                            <td>{{ $project->duration }}</td>
                        </tr>
                        <tr>
                            <th>Development Overview</th>
                            <td>{{ $project->development_overview }}</td>
                        </tr>
                        <tr>
                            <th>System Platform</th>
                            <td>{{ $project->system_platform }}</td>
                        </tr>
                        <tr>
                            <th>Development Methodology</th>
                            <td>{{ $project->development_methodology }}</td>
                        </tr>
                        <tr>
                            <th>Development Method</th>
                            <td>{{ $project->development_method }}</td>
                        </tr>
                        <tr>
                            <th>Business Unit</th>
                            <td>
                                @if ($project->businessUnit)
                                    {{ $project->businessUnit->name }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Lead Developer</th>
                            <td>
                                @if ($project->leadDeveloper)
                                    {{ $project->leadDeveloper->name }}
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
