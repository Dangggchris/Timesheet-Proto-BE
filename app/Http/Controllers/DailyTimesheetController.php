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

    // return all specific timesheets using a user_id and date
    public function allTimesheetForOneUser($userID, $date)
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

    public function store(Request $request)
    {
        $request -> validate([
            // 'user_id' => 'required|integer',
            // 'project_id' => 'required|integer',
            'date' => 'required|date',
            'hours' => 'required|numeric|between:0,24',
            'notes' => 'string',
        ]);

        $timesheet = DailyTimesheet::create($request->all());

        return (new DailyTimesheetResource($timesheet))
                ->response()
                ->setStatusCode(201);
    }


    public function update($id, Request $request)
    {
        // uses unique id to find timesheet
        $timesheet = DailyTimesheet::findOrFail($id);

        $this -> validate($request, [
            'hours' => 'required|numeric|between:0,24',
            'notes' => 'string',
        ]);

        $input = $request->all();

        $timesheet->fill($input)->save;

        return new DailyTimesheetResource($timesheet);
    }
}
