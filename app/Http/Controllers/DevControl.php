<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class DevControl extends Controller
{
    public function viewAssignedProjects()
    {
        // View projects assigned to the developer
        $developerId = auth()->user()->id; // Assuming you have authentication set up
        $projects = Project::whereHas('developers', function ($query) use ($developerId) {
            $query->where('developer_id', $developerId);
        })->get();

        // You may pass the $projects variable to a view for display
        return view('projects.assigned_projects', compact('projects'));
    }

    public function updateTask(Request $request, $taskId)
    {
        // Update an individual task assigned to the developer
        $task = Task::findOrFail($taskId);

        // Validate the request data
        $request->validate([
            'status' => 'required|in:todo,in_progress,completed',
            'description' => 'nullable|string',
        ]);

        // Update task details
        $task->update([
            'status' => $request->input('status'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('projects.show', $task->project_id)->with('success', 'Task updated successfully!');
    }
}
