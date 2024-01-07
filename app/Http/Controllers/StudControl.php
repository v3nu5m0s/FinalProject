<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
class StudControl extends Controller
{
    function addData(Request $req)
    {
        $member = new Students;

        $member->Name = $req->Name;
        $member->ID = $req->ID;
        $member->Year = $req->Year;
        $member->Semester = $req->Semester;
        $member->CGPA = $req->CGPA;
        $member->save();

        return redirect('display');

    }

    function dispData()
    {
        $data=Students::all();

        return view('adminPage',['x'=>$data]);

    }

    function delData($id)
    {
        $data=Students::find($id);

        $data->delete();

        return redirect('display');
    }
}
