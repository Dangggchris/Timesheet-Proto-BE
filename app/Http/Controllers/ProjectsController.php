<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectsCollection;
use App\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //
    public function index()
    {
        return new ProjectsCollection(Projects::all());
    }
}
