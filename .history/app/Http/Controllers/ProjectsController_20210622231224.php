<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {


        $projects = App\Http\Controllers\Models\Project::all();


        return view('projects.index', compact('projects'));


    }


    public function store()
    {


    // validate

    //persist

    App\Models\Project::create(request(['title', 'description']));



    }
}
