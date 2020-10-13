<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        // Project Seed
        // DB::table('projects')->insert([
        //     'id' => '1',
        //     'name' => 'TimesheetProto'
        // ]);
        // DB::table('projects')->insert([
        //     'id' => '2',
        //     'name' => 'DataSlate'
        // ]);
        // DB::table('projects')->insert([
        //     'id' => '3',
        //     'name' => 'TESTPROJECT'
        // ]);
        // DB::table('projects_users')->insert([
        //     'user_id' => 1,
        //     'projects_id' => 2,
        // ]);
        // DB::table('projects_users')->insert([
        //     'user_id' => 1,
        //     'projects_id' => 1,
        // ]);
        // DB::table('projects_users')->insert([
        //     'user_id' => 1,
        //     'projects_id' => 3,
        // ]);
        
        // DB::table('daily_timesheets')->insert([
        //     'user_id' => '1',
        //     'project_id' => '2',
        //     'date' => "2020-10-04",
        //     'hours' => 5.5,
        //     'id' => '1',
        // ]);

        // DB::table('daily_timesheets')->insert([
        //     'user_id' => '1',
        //     'project_id' => '2',
        //     'date' => "2020-10-04",
        //     'hours' => 3.0,
        //     'id' => '4',
        //     'notes' => "hi",
        // ]);

        // DB::table('daily_timesheets')->insert([
        //     'user_id' => '1',
        //     'project_id' => '1',
        //     'date' => "2020-09-28",
        //     'hours' => 7.2,
        //     'id' => '2',
        // ]);

        // DB::table('daily_timesheets')->insert([
        //     'user_id' => '1',
        //     'project_id' => '1',
        //     'date' => "2020-09-30",
        //     'hours' => 8.5,
        //     'id' => '3',
        // ]);
    }
}
