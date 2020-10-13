<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projects;

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
        $projects = Projects::factory()->count(30)->create();
    }
}
