<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Developer;

class ITMSManagerControl extends Controller
{
    public function initiateProject(Request $request)
    {
        // Initiating a new project
        $project = new Project();
        $project->system_owner = $request->input('system_owner');
        $project->system_pic = $request->input('system_pic');
        $project->start_date = now(); // You may adjust the date logic based on your requirements
        $project->duration = $request->input('duration');
        $project->dev_methodology = $request->input('dev_methodology');
        $project->system_platform = $request->input('system_platform');
        $project->deployment_type = $request->input('deployment_type');
        $project->save();

        // You may add more logic as needed, e.g., sending notifications, logging, etc.

        return redirect()->route('projects.index')->with('success', 'Project initiated successfully!');
    }

    public function assignDeveloper(Request $request, $projectId)
    {
        // Assigning a developer to a project
        $project = Project::findOrFail($projectId);

        $leadDeveloper = $request->input('lead_developer');
        $developerIds = $request->input('developers');

        // Assign lead developer
        $project->lead_developer = $leadDeveloper;

        // Assign other developers
        $project->developers()->sync($developerIds);

        $project->save();

        return redirect()->route('projects.show', $projectId)->with('success', 'Developers assigned successfully!');
    }

    public function monitorProjects()
    {
        // Example: Retrieve all projects for monitoring
        $projects = Project::all();

        // You may pass the $projects variable to a view for display
        return view('projects.monitor', compact('projects'));
    }
}
