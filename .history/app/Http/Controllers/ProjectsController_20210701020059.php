<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {

        $projects = Project::all();


        return view('projects.index', compact('projects'));


    }

    public function show()

    {
        $project = Project::findOrFail(request('project'));


        return view('proje')


    }



    public function store()
    {

    //validate
        
    request()->validate(['title' => 'required', 'description' => 'required']);

    //persist

    Project::create(request(['title', 'description']));

    //redirect

    return redirect('/projects');

    }
}
