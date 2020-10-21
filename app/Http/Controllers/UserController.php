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

    $key = "BIu0LHGioSeBBSvWHXcTE6WLLjt6dZVaq3LpvexP2tkRw99y3x79SjtfBmbg6mnmRVPUrNtKfBH2Y03q_AFmPkw";

    $jwt = "eyJhbGciOiJSUzI1NiIsImtpZCI6IjBlM2FlZWUyYjVjMDhjMGMyODFhNGZmN2RjMmRmOGIyMzgyOGQ1YzYiLCJ0eXAiOiJKV1QifQ.eyJuYW1lIjoiQ2VkcmljIE9yZWpvbGEiLCJwaWN0dXJlIjoiaHR0cHM6Ly9saDMuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2EtL0FPaDE0R2hhZ0lJbV9ZN3M3UWhwejRlRHhOQjJuNEJjWEdTd1pCd092N0lRZ3ciLCJpc3MiOiJodHRwczovL3NlY3VyZXRva2VuLmdvb2dsZS5jb20vdmhiLXRpbWVzaGVldC1wcm90byIsImF1ZCI6InZoYi10aW1lc2hlZXQtcHJvdG8iLCJhdXRoX3RpbWUiOjE2MDMzMTgzOTYsInVzZXJfaWQiOiJVbjhON3c3SG4wZTJoa3A0N2YySFhSNDVteXYyIiwic3ViIjoiVW44Tjd3N0huMGUyaGtwNDdmMkhYUjQ1bXl2MiIsImlhdCI6MTYwMzMxODM5NiwiZXhwIjoxNjAzMzIxOTk2LCJlbWFpbCI6ImNlZHJpY29yZWpvbGFAZ21haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImZpcmViYXNlIjp7ImlkZW50aXRpZXMiOnsiZ29vZ2xlLmNvbSI6WyIxMTMwNjU0NjE5MzYwODk5ODY5MTYiXSwiZW1haWwiOlsiY2Vkcmljb3Jlam9sYUBnbWFpbC5jb20iXX0sInNpZ25faW5fcHJvdmlkZXIiOiJnb29nbGUuY29tIn19.ULd5LQsUxfj5-gCBoTzmoa-b38fe9f_wz8h8a8igc9w92GO9znhuaeBSM73B9uokOvZn3DmYyQy7MoLqwdrO1kuHD6yLHHlnhkuxbDrBAaYMKCbbGfoL3GrC47VbcqfZ23VRVwoh4NRV2oXGRE1oYkWpRi3npLKJ2NFAJe5cW6DJWjEa6lF--WJvGrJbaUy1zblVdcAmP-9FPmcyMFamDRQKejNEuur1DKmsABc6P_hpMwEOpSf0VpjpJSfichMoSkBT41vmyHZOyISsk9zIHnLIOiIonCWTkGXqqw80dPLZeQSfhXKj6aiZSv17vS3AG47EM29_hp2K0AwuaenI8Q";

    $decoded = JWT::decode($idTokenString, $key, array('RS256'));

    print_r($decoded);

    return response()->json([
      // 'id' => $id,
      'access_token' => $token,
      'token_type' => 'Bearer',
      // 'expires_at' => Carbon::parse(
      //   $token->expires_at
      // )->toDateTimeString()
    ]);

    
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
