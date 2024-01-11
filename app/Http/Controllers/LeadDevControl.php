<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class LeadDevControl extends Controller
{
    public function index()
    {
        $leadDevelopers = LeadDeveloper::all();
        return view('lead_developers.index', compact('leadDevelopers'));
    }

    public function create()
    {
        return view('lead_developers.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Store the lead developer data
        LeadDeveloper::create($validatedData);

        return redirect()->route('lead_developers.index')->with('success', 'Lead Developer created successfully');
    }

    public function show($id)
    {
        $leadDeveloper = LeadDeveloper::findOrFail($id);
        return view('lead_developers.show', compact('leadDeveloper'));
    }

    public function edit($id)
    {
        $leadDeveloper = LeadDeveloper::findOrFail($id);
        return view('lead_developers.edit', compact('leadDeveloper'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Update the lead developer data
        LeadDeveloper::findOrFail($id)->update($validatedData);

        return redirect()->route('lead_developers.index')->with('success', 'Lead Developer updated successfully');
    }

    public function destroy($id)
    {
        // Delete the lead developer
        LeadDeveloper::findOrFail($id)->delete();

        return redirect()->route('lead_developers.index')->with('success', 'Lead Developer deleted successfully');
    }
}