<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Projects;
use App\Models\DailyTimesheet;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $projects = Projects::factory()
        ->count(3)
        ->has(User::factory())
        ->has(DailyTimesheet::factory())
        ->create();
    }
}
