<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectControl extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create() //create new project
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'system_owner' => 'required|string|max:255',
            'system_pic' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'dev_methodology' => 'required|string|max:255',
            'system_platform' => 'required|string|max:255',
            'deployment_type' => 'required|string|max:255',
        ]);

        Project::create($validatedData);

        return redirect()->route('projects.index')
            ->with('success', 'Project initiated successfully!');
    }

    public function show($id) //show project details
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id) //edit project details
    {
        $validatedData = $request->validate([
            'system_owner' => 'required|string|max:255',
            'system_pic' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'dev_methodology' => 'required|string|max:255',
            'system_platform' => 'required|string|max:255',
            'deployment_type' => 'required|string|max:255',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return redirect()->route('projects.show', $id)
            ->with('success', 'Project details updated successfully!');
    }

    public function update(Request $request, $id) //update projects details
    {
        $validatedData = $request->validate([
            'system_owner' => 'required|string|max:255',
            'system_pic' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'dev_methodology' => 'required|string|max:255',
            'system_platform' => 'required|string|max:255',
            'deployment_type' => 'required|string|max:255',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return redirect()->route('projects.show', $id)
            ->with('success', 'Project details updated successfully!');
    }

    public function destroy($id) //delete a project
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}
