<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;
use App\Models\Developer;
use App\Models\Project;

class ProjectControl extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('projects.create', compact('businessUnits', 'developers'));
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'business_unit_id' => 'required',
            'name' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'end_date' => 'required|date',
            'status' => 'required|string',
        ]);

        // Create a new project
        $project = Project::create($validatedData);

        // Attach developers to the project if needed
        $project->developers()->attach($request->input('developer_ids'));

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('projects.edit', compact('project', 'businessUnits', 'developers'));
    }

    public function update(Request $request, Project $project)
    {
        // Validate input data
        $validatedData = $request->validate([
            'business_unit_id' => 'required',
            'name' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'end_date' => 'required|date',
            'status' => 'required|string',


        ]);
    

        // Update the project
        $project->update($validatedData);

        // Sync developers to the project if needed
        $project->developers()->sync($request->input('developer_ids'));

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
