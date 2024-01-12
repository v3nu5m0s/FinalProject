<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;
use App\Models\ProgressReport;
use App\Models\Developer;

class ProgressControl extends Controller
{
    public function index()
    {
        $progressReports = ProgressReport::all();
        return view('progress_reports.index', compact('progressReports'));
    }

    public function create()
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('progress_reports.create', compact('businessUnits', 'developers'));
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'date' => 'required|date',
            'status' => 'required|in:Ahead of Schedule,On Schedule,Delayed,Completed',
            'description' => 'required|string',
            // Add other fields and validation rules as needed
        ]);

        // Create a new ProgressReport
        $ProgressReport = ProgressReport::create($validatedData);

        
        return redirect()->route('progress-reports.index')->with('success', 'ProgressReport created successfully');
    }

    public function show(ProgressReport $progressReport)
    {
        return view('progress_reports.show', compact('progressReport'));
    }

    public function edit(ProgressReport $progressReport)
    {
        // Fetch necessary data for dropdowns or other inputs
        $businessUnits = BusinessUnit::all();
        $developers = Developer::all();

        return view('progress_reports.edit', compact('progressReport', 'businessUnits', 'developers'));
    }

    public function update(Request $request, ProgressReport $ProgressReport)
    {
        // Validate input data
        $validatedData = $request->validate([
            'date' => 'required|date',
            'status' => 'required|in:Ahead of Schedule,On Schedule,Delayed,Completed',
            'description' => 'required|string',
            // Add other fields and validation rules as needed
        ]);

        // Update the ProgressReport
        $ProgressReport->update($validatedData);


        return redirect()->route('progress-reports.index')->with('success', 'ProgressReport updated successfully');
    }

    public function destroy(ProgressReport $ProgressReport)
    {
        $ProgressReport->delete();

        return redirect()->route('progress-reports.index')->with('success', 'ProgressReport deleted successfully');
    }
}
