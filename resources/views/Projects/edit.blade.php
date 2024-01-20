@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Update Project</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT') <!-- Use PUT method for updates -->

            <div class="row">
                {{-- Project Information --}}
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Project Information</h3>
                        </div>

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="pro_id" class="form-label">Project ID:</label>
                                <input type="text" name="pro_id" id="pro_id" class="form-control" 
                                value="{{ old('pro_id', $project->pro_id) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $project->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Project Description:</label>
                                <textarea name="description" id="description" class="form-control"
                                    required>{{ old('description', $project->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Project Timeline and Progress --}}
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title">Project Timeline and Progress</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="Ahead of Schedule" {{ $project->status == 'Ahead of Schedule' ? 'selected' : '' }}>
                                    Ahead of Schedule
                                    </option>
                                    <option value="On Schedule" {{ $project->status == 'On Schedule' ? 'selected' : '' }}>
                                    On Schedule
                                    </option>
                                    <option value="Delayed" {{ $project->status == 'Delayed' ? 'selected' : '' }}>
                                    Delayed
                                    </option>
                                    <option value="Completed" {{ $project->status == 'Completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                    value="{{ old('start_date', $project->start_date) }}" required
                                    onchange="updateDuration()">
                            </div>

                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date:</label>
                                <input type="date" name="end_date" id="end_date" class="form-control"
                                    value="{{ old('end_date', $project->end_date) }}" required
                                    onchange="updateDuration()">
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration (in days):</label>
                                <input type="number" name="duration" id="duration" class="form-control"
                                    value="{{ old('duration', $project->duration) }}" required readonly>
                            </div>

                            <div class="mb-3">
                                <label for="development_overview" class="form-label">Development Overview:</label>
                                <textarea name="development_overview" id="development_overview" class="form-control"
                                    required>{{ old('development_overview', $project->development_overview) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- System Information --}}
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">System Information</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="system_platform" class="form-label">System Platform:</label>
                        <select name="system_platform" id="system_platform" class="form-select" required>
                            <option value="Web" {{ $project->system_platform == 'Web' ? 'selected' : '' }}>Web</option>
                            <option value="Mobile" {{ $project->system_platform == 'Mobile' ? 'selected' : '' }}>Mobile
                            </option>
                            <option value="Stand-alone" {{ $project->system_platform == 'Stand-alone' ? 'selected' : '' }}>
                                Stand-alone</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="development_methodology" class="form-label">Development Methodology:</label>
                        <select name="development_methodology" id="development_methodology" class="form-select" required>
                            <option value="Agile" {{ $project->development_methodology == 'Agile' ? 'selected' : '' }}>
                                Agile</option>
                            <option value="Prototyping"
                                {{ $project->development_methodology == 'Prototyping' ? 'selected' : '' }}>Prototyping
                            </option>
                            <option value="Waterfall"
                                {{ $project->development_methodology == 'Waterfall' ? 'selected' : '' }}>Waterfall</option>
                            <option value="Rapid Application Development"
                                {{ $project->development_methodology == 'Rapid Application Development' ? 'selected' : '' }}>
                                Rapid Application Development</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="development_method" class="form-label">Development Method:</label>
                        <select name="development_method" id="development_method" class="form-select" required>
                            <option value="Cloud" {{ $project->development_method == 'Cloud' ? 'selected' : '' }}>Cloud
                            </option>
                            <option value="On-premise"
                                {{ $project->development_method == 'On-premise' ? 'selected' : '' }}>On-premise
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- System Owner --}}
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">System Owner</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="business_unit_id" class="form-label">Business Unit:</label>
                        <select name="business_unit_id" id="business_unit_id" class="form-select" required>
                            <!-- Populate the dropdown with business units -->
                            @foreach ($businessUnits as $businessUnit)
                                <option value="{{ $businessUnit->id }}"
                                    {{ $project->business_unit_id == $businessUnit->id ? 'selected' : '' }}>
                                    {{ $businessUnit->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="lead_developer_id" class="form-label">Lead Developer:</label>
                        <select name="lead_developer_id" id="lead_developer_id" class="form-select" required>
                            <!-- Populate the dropdown with developers -->
                            @foreach ($developers as $developer)
                                <option value="{{ $developer->id }}"
                                    {{ $project->lead_developer_id == $developer->id ? 'selected' : '' }}>
                                    {{ $developer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2" onclick="return confirm('Are you sure to update the data?')">Update</button>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>

    <script>
        function updateDuration() {
            var startDate = new Date(document.getElementById("start_date").value);
            var endDate = new Date(document.getElementById("end_date").value);

            if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime()) && startDate <= endDate) {
                var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
                var duration = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Calculate duration in days
                document.getElementById("duration").value = duration;
            }
        }
    </script>
@endsection
