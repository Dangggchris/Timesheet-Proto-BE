<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyTimesheetController extends Controller
{
    //
    public function create()
    {
        return view('createdailytimesheet');
    }

    public function store(Request $request) {
        \App\DailyTimesheet::create([
            'project_id' => $request->get('project_id'),
            'user_id' => $request->get('user_id'),
            'date' => $request->get('date'),
            'hours' => $request->get('hours'),
            'notes' => $request->get('notes'),
        ]);

        return redirect('/dailytimesheet');
    }

    public function index()
    {
        // $dailytimesheet = \App\DailyTimesheet::all();
        $dailytimesheet = DB::table('daily_timesheet_table')->get();

        return response()
                ->json($dailytimesheet);
                // ->withCallback($request->input('callback'));

    }

    public function update() 
    {
        $data = request() -> validate([
            'user_id' => 'required | integer',
            'project_id' => 'required | integer',
            'date' => 'required | date',
            'hours' => 'required | numeric | between:1,3',
            'notes' => '',
        ]);

        $validator = Validator::make(Input::all(), $data);
        // $data = DB::table('daily_timesheet_table')->where('user_id', )
    }
}
