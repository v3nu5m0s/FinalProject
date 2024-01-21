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
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('Projects.create', compact('businessUnits', 'developers'));
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateProjectData($request);

        $project = Project::create($validatedData);

        $this->attachDevelopers($project, $request);

        return redirect()->route('projects.index')->with('success', 'Project created successfully');
    }

    public function show(Project $project)
    {
        return view('Projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('Projects.edit', compact('project', 'businessUnits', 'developers'));
    }

    public function update(Request $request, Project $project)
    {
        $validatedData = $this->validateProjectData($request);

        $project->update($validatedData);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully');
    }

    public function restore($id)
    {
        $project = Project::withTrashed()->find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->restore();

        return response()->json(['message' => 'Project restored successfully']);
    }

    public function showDeletedProjects()
    {
        $deletedProjects = Project::onlyTrashed()->get();

        return view('Projects.deleted', compact('deletedProjects'));
    }

    public function restoreProject($id)
    {
        $project = Project::withTrashed()->find($id);

        if ($project) {
            $project->restore();
            return redirect()->route('projects.deleted')->with('success', 'Project restored successfully');
        } else {
            return redirect()->route('projects.deleted')->with('error', 'Project not found');
        }
    }

    private function validateProjectData(Request $request)
    {
        $rules = [
            'start_date' => 'required|date',
            'duration' => 'required|integer',
            'end_date' => 'required|date',
            'status' => 'required|string',
            'development_overview' => 'required',
        ];
    
        // Only apply these rules for userLevel 0
        if (auth()->user()->userLevel == 0) {
            $rules += [
                'business_unit_id' => 'required|exists:business_units,id',
                'pro_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'system_platform' => 'required|in:Web,Mobile,Stand-alone',
                'development_methodology' => 'required|in:Agile,Prototyping,Waterfall,Rapid Application Development',
                'development_method' => 'required|in:Cloud,On-premise',
            ];
        }
    
        return $request->validate($rules);

        /*return $request->validate([
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
        ]);*/
    }

    private function attachDevelopers(Project $project, Request $request)
    {
        if ($request->filled('lead_developer_id')) {
            $project->leadDeveloper()->associate($request->input('lead_developer_id'))->save();
        }

        $project->developers()->attach($request->input('developer_ids'));
    }
}
