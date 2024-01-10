<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;
use App\Models\Project;

class BusinessControl extends Controller
{
    public function viewProjects($businessUnitId)
    {
        // View projects owned by a business unit
        $businessUnit = BusinessUnit::findOrFail($businessUnitId);
        $projects = $businessUnit->projects;

        // You may pass the $projects variable to a view for display
        return view('business_units.projects', compact('businessUnit', 'projects'));
    }
}
