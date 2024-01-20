@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Create Your Project</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('projects.store') }}">
            @csrf

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
                                <input type="text" name="pro_id" id="pro_id" class="form-control" value="{{ old('pro_id') }}" required>
                            </div>
                             
                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Project Description:</label>
                                <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
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
                                    <option value="" selected>Please Choose</option>
                                    <option value="Ahead of Schedule">Ahead of Schedule</option>
                                    <option value="On Schedule">On Schedule</option>
                                    <option value="Delayed">Delayed</option>
                                    <option value="Completed">Completed</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required onchange="updateDuration()">
                            </div>

                            <div class="mb-3">
                                <label for="end_date" class="form-label">End Date:</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required onchange="updateDuration()">
                            </div>

                            <div class="mb-3">
                                <label for="duration" class="form-label">Duration (in days):</label>
                                <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration') }}" required readonly>
                            </div>

                            <div class="mb-3">
                                <label for="development_overview" class="form-label">Development Overview:</label>
                                <textarea name="development_overview" id="development_overview" class="form-control" required>{{ old('development_overview') }}</textarea>
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
                            <option value="" selected>Please Choose</option>
                            <option value="Web">Web</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Stand-alone">Stand-alone</option>
                        </select>
                        @error('system_platform')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="development_methodology" class="form-label">Development Methodology:</label>
                        <select name="development_methodology" id="development_methodology" class="form-select" required>
                            <option value="" selected>Please Choose</option>
                            <option value="Agile">Agile</option>
                            <option value="Prototyping">Prototyping</option>
                            <option value="Waterfall">Waterfall</option>
                            <option value="Rapid Application Development">Rapid Application Development</option>
                        </select>
                        @error('development_methodology')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="development_method" class="form-label">Development Method:</label>
                        <select name="development_method" id="development_method" class="form-select" required>
                            <option value="" selected>Please Choose</option>
                            <option value="Cloud">Cloud</option>
                            <option value="On-premise">On-premise</option>
                        </select>
                        @error('development_method')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                            <option value="" selected>Please Choose</option>
                            <!-- Populate the dropdown with business units -->
                            @foreach ($businessUnits as $businessUnit)
                                <option value="{{ $businessUnit->id }}">{{ $businessUnit->name }}</option>
                            @endforeach
                        </select>
                        @error('business_unit_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="lead_developer_id" class="form-label">Lead Developer:</label>
                        <select name="lead_developer_id" id="lead_developer_id" class="form-select" required>
                            <option value="" selected>Please Choose</option>
                            <!-- Populate the dropdown with developers -->
                            @foreach ($developers as $developer)
                                <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                            @endforeach
                        </select>
                        @error('lead_developer_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">Create</button>
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
