<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Developer;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('Projects.index', compact('projects'));
    }

    public function create()
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('Projects.create', compact('businessUnits', 'developers'));
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'business_unit_id' => 'required|exists:business_units,id',
            'pro_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'end_date' => 'required|date',
            'status' => 'required|string',
            'development_overview' => 'required',
            'system_platform' => 'required|in:Web,Mobile,Stand-alone',
            'development_methodology' => 'required|in:Agile,Prototyping,Waterfall,Rapid Application Development',
            'development_method' => 'required|in:Cloud,On-premise',
        ]);

        // Create a new project
        $project = Project::create($validatedData);

        // Attach developers to the project if needed
        $project->developers()->attach($request->input('developer_ids'));

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function show(Project $project)
    {
        return view('Projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('Projects.edit', compact('project', 'businessUnits', 'developers'));
    }

    public function update(Request $request, Project $project)
    {
        // Validate input data
        $validatedData = $request->validate([
            'business_unit_id' => 'required|exists:business_units,id',
            'pro_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'end_date' => 'required|date',
            'status' => 'required|string',
            'development_overview' => 'required',
            'system_platform' => 'required|in:Web,Mobile,Stand-alone',
            'development_methodology' => 'required|in:Agile,Prototyping,Waterfall,Rapid Application Development',
            'development_method' => 'required|in:Cloud,On-premise',
        ]);

        // Update the project
        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }
}
