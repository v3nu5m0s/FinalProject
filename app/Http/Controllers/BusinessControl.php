<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;
use App\Models\Project;

class BusinessUnitController extends Controller
{
    public function index()
    {
        $businessUnits = BusinessUnit::all();
        return view('IBusinessUnit.index', compact('businessUnit'));
    }

    public function create()
    {
        return view('IBusinessUnit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        BusinessUnit::create($request->all());

        return redirect()->route('IBusinessUnit.index')->with('success', 'Business Unit created successfully');
    }

    public function show($id)
    {
        $businessUnit = BusinessUnit::findOrFail($id);
        return view('IBusinessUnit.show', compact('businessUnit'));
    }

    public function edit($id)
    {
        $businessUnit = BusinessUnit::findOrFail($id);
        return view('IBusinessUnit.edit', compact('businessUnit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $businessUnit = BusinessUnit::findOrFail($id);
        $businessUnit->update($request->all());

        return redirect()->route('IBusinessUnit.index')->with('success', 'Business Unit updated successfully');
    }

    public function destroy($id)
    {
        $businessUnit = BusinessUnit::findOrFail($id);
        $businessUnit->delete();

        return redirect()->route('IBusinessUnit.index')->with('success', 'Business Unit deleted successfully');
    }
}
