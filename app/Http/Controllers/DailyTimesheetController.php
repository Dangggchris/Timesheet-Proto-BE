<?php

namespace App\Http\Controllers;
use App\DailyTimesheet;
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

    //return timesheet using unique timesheet id
    public function show($id)
    {
        return new DailyTimesheetResource(DailyTimesheet::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'user_id' => 'required|integer',
            'project_id' => 'required|integer',
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
        $request -> validate([
            'user_id' => 'required|integer',
            'project_id' => 'required|integer',
            'date' => 'required|date',
            'hours' => 'required|numeric|between:0,24',
            'notes' => 'string',
        ]);
        
        // uses unique id to find timesheet
        $timesheet = DailyTimesheet::findOrFail($id);
        $timesheet -> $request;
        $timesheet->save();

        return new DailyTimesheetResource($timesheet);
    }
}
