<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;
use App\Models\Developer;
use App\Models\Project;

class LeadDevController extends Controller
{
    public function index()
    {
        $developers = Developer::with('projects')->get();
        return view('Developers.index', compact('developers'));
    }

    public function create()
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('Developers.create', compact('businessUnits', 'developers'));
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dev_id' => 'required|string|max:255',
        ]);

        // Create a new Developer
        $developer = Developer::create($validatedData);

        return redirect()->route('developers.index')->with('success', 'Developer created successfully');
    }

    public function show(Developer $developer)
    {
        $projects = $developer->projects;

        return view('Developers.show', compact('developer', 'projects'));
    }

    public function edit(Developer $developer)
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('Developers.edit', compact('developer', 'businessUnits', 'developers'));
    }

    public function update(Request $request, Developer $developer)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dev_id' => 'required|string|max:255',
        ]);

        // Update the Developer
        $developer->update($validatedData);

        return redirect()->route('developers.index')->with('success', 'Developer updated successfully');
    }

    public function destroy(Developer $developer)
    {
        $developer->delete();

        return redirect()->route('developers.index')->with('success', 'Developer deleted successfully');
    }
}
