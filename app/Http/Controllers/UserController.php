<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\Auth\Token\Exception\InvalidToken;
use \Firebase\JWT\JWT;

use App\Http\Resources\Projects as ProjectsResource;
use App\Http\Resources\ProjectsCollection;

use App\Models\User;
use App\Models\Projects;

use Carbon\Carbon;

class UserController extends Controller
{
  // You should ensure that all datas received are valid and secure.

  public function login(Request $request)
  {

    // Launch Firebase Auth
    $auth = app('firebase.auth');
    // Retrieve the Firebase credential's token
    $idTokenString = $request->input('Firebasetoken');

    try { // Try to verify the Firebase credential token with Google

      $verifiedIdToken = $auth->verifyIdToken($idTokenString);
    } catch (\InvalidArgumentException $e) { // If the token has the wrong format

      return response()->json([
        'message' => 'Unauthorized - Can\'t parse the token: ' . $e->getMessage()
      ], 401);
    } catch (InvalidToken $e) { // If the token is invalid (expired ...)

      return response()->json([
        'message' => 'Unauthorized - Token is invalide: ' . $e->getMessage()
      ], 401);
    }

    $token= $idTokenString;

    $decoded = json_decode(base64_decode(str_replace('_', '/', str_replace('-', '+', explode('.', $token)[1]))));

    $googleID = $decoded->user_id;
    // $googleName = $decoded->displayName;

    $user = User::firstOrCreate(
      ['guid' => $googleID]
    );

    // creates a relationship between new user and project 1 by default
    $user->projects()->attach("1");

    $user_id = $user->id;

    return $user_id;
  }

  // return all projects for user
  public function getProjects($userID){
    
    return new ProjectsCollection(Projects::where('id', $userID)
    ->get());
  }

  // check database for google uid
  // public function findOrCreateUser(Request $request) {

  //   $guid = $request->uid;
  //   $name = $request->displayName

  //       $user = User::firstOrCreate(
  //         ['guid' => $guid],
  //         ['name' => $name]
  //       );
    
  //       return $id = $user->id;
  // }
}
