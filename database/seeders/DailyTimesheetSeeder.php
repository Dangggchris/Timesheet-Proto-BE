<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DailyTimesheet;
use App\Models\Projects;

class DailyTimesheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $timesheet = DailyTimesheet::factory()
        ->count(3)
        ->has(Projects::factory())
        ->create();

    }
}
