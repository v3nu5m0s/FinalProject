<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> {{-- Adjust the path if needed --}}
</head>

<body>

    <div class="welcome-container">
        <h1>Welcome to the Project Management System</h1>
        
        <div class="roles-section">
            <div class="role-box manager-box">
                <h2>Manager</h2>
                <p>Assign and monitor projects.</p>
                <a class="dashboard-link" href="{{ route('manager.dashboard') }}">Go to Manager Dashboard</a>
            </div>

            <div class="role-box lead-developer-box">
                <h2>Lead Developer</h2>
                <p>Update project progress and submit reports.</p>
                <a class="dashboard-link" href="{{ route('lead-developer.dashboard') }}">Go to Lead Developer Dashboard</a>
            </div>

            <div class="role-box business-unit-box">
                <h2>Business Unit Owner</h2>
                <p>Initiate project requests and monitor progress.</p>
                <a class="dashboard-link" href="{{ route('business-unit.dashboard') }}">Go to Business Unit Dashboard</a>
            </div>
        </div>
    </div>

</body>

</html>
