<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Developer;
use App\Models\Manager;


class ITMSManagerControl extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        return view('imanager.index', compact('manager'));
    }

    public function create()
    {
        return view('imanager.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        $manager = Manager::create([
            'name' => $request->input('name'),
            // Add more fields as needed
        ]);

        return redirect()->route('imanager.show', $manager->id)
            ->with('success', 'Manager created successfully');
    }

    public function show($id)
    {
        $manager = Manager::findOrFail($id);
        return view('imanager.show', compact('manager'));
    }

    public function edit($id)
    {
        $manager = Manager::findOrFail($id);
        return view('imanager.edit', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        $manager = Manager::findOrFail($id);
        $manager->update([
            'name' => $request->input('name'),
            // Add more fields as needed
        ]);

        return redirect()->route('imanager.show', $manager->id)
            ->with('success', 'Manager updated successfully');
    }

    public function destroy($id)
    {
        $manager = Manager::findOrFail($id);

        // Example: Delete projects assigned to this manager
        Project::where('manager_id', $id)->delete();

        // Example: Update lead developers assigned to this manager
        LeadDeveloper::where('manager_id', $id)->update(['manager_id' => null]);

        $manager->delete();

        return redirect()->route('imanager.index')
            ->with('success', 'Manager deleted successfully');
    }
}
