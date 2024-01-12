<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\businessunit;
use App\Models\developer;

class ProjectControl extends Controller
{
    public function index()
    {
        $project = Project::all();
        return view('iproject.index', compact('iproject'));
    }

    public function create()
    {
        $businessUnits = BusinessUnit::all();
        $leadDevelopers = LeadDeveloper::all();
        return view('iproject.create', compact('businessUnit', 'leadDeveloper'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'system_owner' => 'required',
            'system_pic' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|numeric',
            'end_date' => 'required|date',
            'status' => 'required',
            'lead_developer' => 'required',
            'developers' => 'array',
            'development_methodology' => 'required',
            'system_platform' => 'required',
            'deployment_type' => 'required',
        ]);

        // Create a new project
        $project = Project::create($request->all());

        // Redirect to the project details page
        return redirect()->route('iproject.show', $project->id);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('iproject.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $businessUnits = BusinessUnit::all();
        $leadDevelopers = LeadDeveloper::all();
        return view('iproject.edit', compact('project', 'businessUnit', 'leadDeveloper'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'system_owner' => 'required',
            // Add other validation rules as needed
        ]);

        // Find the project
        $project = Project::findOrFail($id);

        // Update the project
        $project->update($request->all());

        // Redirect to the project details page
        return redirect()->route('iproject.show', $project->id);
    }

    public function destroy($id)
    {
        // Find the project and delete it
        Project::findOrFail($id)->delete();

        // Redirect to the projects index page
        return redirect()->route('iproject.index');
    }
}