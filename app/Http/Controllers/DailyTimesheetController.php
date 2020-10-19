<?php

namespace App\Http\Controllers;
use App\Models\DailyTimesheet;
use App\Http\Resources\DailyTimesheet as DailyTimesheetResource;
use App\Http\Resources\DailyTimesheetCollection;
use Illuminate\Http\Request;


class DailyTimesheetController extends Controller
{
    // return all timesheets 
    public function index()
    {
        return new DailyTimesheetCollection(DailyTimesheet::all());
    }

    // return all timesheets for history page
    public function allTimesheetsForOneUser($userID)
    {
        return new DailyTimesheetCollection(DailyTimesheet::where('user_id', $userID)
        ->get());
    }

    // return all specific timesheets using a user_id and date for modal
    public function allTimesheetForOneUserForDay($userID, $date)
    {
        return new DailyTimesheetCollection(DailyTimesheet::where('user_id', $userID)
        ->where('date', $date)
        ->get());
    }

    //return timesheet using unique timesheet id
    public function show($id)
    {
        return new DailyTimesheetResource(DailyTimesheet::findOrFail($id));
    }

    // updates existing timesheet or else create new 
    public function updateOrCreate($userID, $projectID, Request $request)
    {
        $hours = $request -> input('hours');
        $date = $request -> input('date');

        // uses unique id to find timesheet
        $timesheet = DailyTimesheet::updateOrCreate(
            [ 'user_id' => $userID, 'projects_id' => $projectID, 'date' => $date  ],
            [ 'hours' => $hours ]
        );

        return new DailyTimesheetResource($timesheet);
    }
}
