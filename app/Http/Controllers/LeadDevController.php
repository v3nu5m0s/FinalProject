<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;
use App\Models\Developer;

class LeadDevController extends Controller
{
    public function index()
    {
        $developers = Developer::all();
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
            'pro_id' => 'integer',
        ]);

        // Create a new Developer
        $Developer = Developer::create($validatedData);

        // Attach developers to the Developer if needed

        return redirect()->route('developers.index')->with('success', 'Developer created successfully');
    }

    public function show(Developer $developer)
    {
        return view('Developers.show', compact('developer'));
    }

    public function edit(Developer $developer)
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('Developers.edit', compact('developer', 'businessUnits', 'developers'));
    }

    public function update(Request $request, Developer $Developer)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'dev_id' => 'required|string|max:255',
            'pro_id' => 'integer'
        ]);

        // Update the Developer
        $Developer->update($validatedData);


        return redirect()->route('developers.index')->with('success', 'Developer updated successfully');
    }

    public function destroy(Developer $Developer)
    {
        $Developer->delete();

        return redirect()->route('developers.index')->with('success', 'Developer deleted successfully');
    }
}
