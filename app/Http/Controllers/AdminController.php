<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // adds new project
    public function newProject(Request $request)
    {
        return Projects::create([
            'name' => $request->name
        ]);
    }

    // attach user to project
    public function attachProjectToUser($userID, $projectID)
    {
        $user = User::find($userID);

        return $user->projects()->attach($projectID);
    
    }
}
