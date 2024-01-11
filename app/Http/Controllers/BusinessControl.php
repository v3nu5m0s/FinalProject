<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;
use App\Models\Project;

class BusinessControl extends Controller
{
    public function index()
    {
        $businessUnit = BusinessUnit::all();
        return view('Interface_BusinessUnit.index', compact('businessUnit'));
    }

    public function create()
    {
        return view('Interface_BusinessUnit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        BusinessUnit::create($request->all());

        return redirect()->route('Interface_BusinessUnit.index')->with('success', 'Business Unit created successfully');
    }

    public function show($id)
    {
        $businessUnit = BusinessUnit::findOrFail($id);
        return view('Interface_BusinessUnit.show', compact('businessUnit'));
    }

    public function edit($id)
    {
        $businessUnit = BusinessUnit::findOrFail($id);
        return view('Interface_BusinessUnit.edit', compact('businessUnit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        $businessUnit = BusinessUnit::findOrFail($id);
        $businessUnit->update($request->all());

        return redirect()->route('Interface_BusinessUnit.index')->with('success', 'Business Unit updated successfully');
    }

    public function destroy($id)
    {
        $businessUnit = BusinessUnit::findOrFail($id);
        $businessUnit->delete();

        return redirect()->route('Interface_BusinessUnit.index')->with('success', 'Business Unit deleted successfully');
    }
}
