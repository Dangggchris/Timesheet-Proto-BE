<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectsCollection;
use App\Models\Projects;
use App\Models\User;

class ProjectsController extends Controller
{
    //
    public function index()
    {
        return new ProjectsCollection(Projects::all());
    }

    // grabs all projects for one user
    public function getAllProjectsForOneUser($userID)
    {
        $user = User::find($userID);
        
        return $user = $user->projects->pluck('name');
    }
}
