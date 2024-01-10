<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class LeadDevControl extends Controller
{
    public function updateProgress(Request $request, $projectId)
    {
        // Update the progress of the development
        $project = Project::findOrFail($projectId);

        // Validate the request data
        $request->validate([
            'date' => 'required|date',
            'status' => 'required|in:ahead_of_schedule,on_schedule,delayed,completed',
            'description' => 'required|string',
        ]);

        // Update progress details
        $project->progressReports()->create([
            'date' => $request->input('date'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('projects.show', $projectId)->with('success', 'Progress updated successfully!');
    }

    public function viewProgressReports($projectId)
    {
        // View progress reports for a project
        $project = Project::findOrFail($projectId);

        // Retrieve progress reports for the project
        $progressReports = $project->progressReports;

        // You may pass the $progressReports variable to a view for display
        return view('projects.progress_reports', compact('project', 'progressReports'));
    }
}
