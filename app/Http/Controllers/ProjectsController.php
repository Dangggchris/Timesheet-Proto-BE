<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //
    public function create()
    {
        return view('createproject');
    }

    public function store(Request $request) {
        \App\Projects::create([
            'name' => $request->get('name'),
        ]);

        return redirect('/projects');
    }

    public function index()
    {
        $projects = \App\Projects::all();

        return view('viewprojects', ['allProjects' => $projects]);
    }
}
