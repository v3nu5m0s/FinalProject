<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Project</title>
</head>
<body>
    <h1>Create New Project</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <label for="system_owner">System Owner:</label>
        <input type="text" name="system_owner" required>

        <label for="system_pic">System PIC:</label>
        <input type="text" name="system_pic" required>

        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" required>

        <label for="duration">Duration (in days):</label>
        <input type="number" name="duration" required>

        <label for="dev_methodology">Development Methodology:</label>
        <input type="text" name="dev_methodology" required>

        <label for="system_platform">System Platform:</label>
        <input type="text" name="system_platform" required>

        <label for="deployment_type">Deployment Type:</label>
        <input type="text" name="deployment_type" required>

        <button type="submit">Initiate Project</button>
    </form>
</body>
</html>
