<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        
        $projects = App\Models\Project::all();


        return view('projects.index', compact('projects'));


    }


    public function store()
    {



    }
}
