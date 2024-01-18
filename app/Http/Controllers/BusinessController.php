<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use App\Models\Developer;


class BusinessController extends Controller
{
    public function index()
    {
        $businessUnits = BusinessUnit::all();

        return view('BusinessUnits.index', ['businessUnits' => $businessUnits]);
    }

    public function create()
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('BusinessUnits.create', compact('businessUnits', 'developers'));
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bis_id' => 'required|string|max:255',
        ]);
        
        // Create a new BusinessUnit
        $BusinessUnit = BusinessUnit::create($validatedData);


        return redirect()->route('business-units.index')->with('success', 'BusinessUnit created successfully');
    }

    public function show(BusinessUnit $businessUnit)
    {
        return view('BusinessUnits.show', compact('businessUnit'));
    }

    public function edit(BusinessUnit $businessUnit)
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('BusinessUnits.edit', compact('businessUnit', 'businessUnits', 'developers'));
    }

    public function update(Request $request, BusinessUnit $BusinessUnit)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bis_id' => 'required|string|max:255',
        ]);

        // Update the BusinessUnit
        $BusinessUnit->update($validatedData);


        return redirect()->route('business-units.index')->with('success', 'BusinessUnit updated successfully');
    }

    public function destroy(BusinessUnit $BusinessUnit)
    {
        $BusinessUnit->delete();

        return redirect()->route('business-units.index')->with('success', 'BusinessUnit deleted successfully');
    }
}
