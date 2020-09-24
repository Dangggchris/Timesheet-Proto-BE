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
        // Project Seed
        DB::table('projects')->insert([
            'id' => '1',
            'name' => 'TimesheetProto'
        ]);
        DB::table('projects')->insert([
            'id' => '2',
            'name' => 'DataSlate'
        ]);
        
        DB::table('dailytimesheet')->insert([
            'user_id' => '1',
            'project_id' => '2',
            'date' => 9/2/2020,
            'hours' => 5.5,
            'id' => '1',
        ]);

        DB::table('dailytimesheet')->insert([
            'user_id' => '1',
            'project_id' => '2',
            'date' => 9/6/2020,
            'hours' => 3.0,
            'id' => '4',
        ]);

        DB::table('dailytimesheet')->insert([
            'user_id' => '1',
            'project_id' => '1',
            'date' => 9/1/2020,
            'hours' => 7.2,
            'id' => '2',
        ]);

        DB::table('dailytimesheet')->insert([
            'user_id' => '1',
            'project_id' => '1',
            'date' => 9/3/2020,
            'hours' => 8.5,
            'id' => '3',
        ]);
    }
}
