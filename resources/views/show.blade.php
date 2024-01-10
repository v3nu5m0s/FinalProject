<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
</head>
<body>
    <h1>Project Details</h1>

    <p><strong>ID:</strong> {{ $project->id }}</p>
    <p><strong>System Owner:</strong> {{ $project->system_owner }}</p>
    <p><strong>System PIC:</strong> {{ $project->system_pic }}</p>
    <p><strong>Start Date:</strong> {{ $project->start_date }}</p>
    <p><strong>Duration:</strong> {{ $project->duration }} days</p>
    <p><strong>Status:</strong> {{ $project->status }}</p>
    <p><strong>Lead Developer:</strong> {{ $project->lead_developer }}</p>
    <p><strong>Developers:</strong> {{ $project->developers }}</p>
    <p><strong>Development Methodology:</strong> {{ $project->dev_methodology }}</p>
    <p><strong>System Platform:</strong> {{ $project->system_platform }}</p>
    <p><strong>Deployment Type:</strong> {{ $project->deployment_type }}</p>

    <!-- Add more details as needed -->

    <a href="{{ route('projects.index') }}">Back to Project List</a>
</body>
<form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
    @csrf
    @method('DELETE')

    <button type="submit">Delete Project</button>
</form>
</html>
