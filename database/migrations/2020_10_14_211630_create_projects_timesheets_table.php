<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_timesheet_projects', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('daily_timesheet_id');
            $table->unsignedBigInteger('projects_id');
            $table->timestamps();

            $table->unique(['daily_timesheet_id','projects_id']);

            $table->foreign('daily_timesheet_id')->references('id')->on('daily_timesheets')->onDelete('cascade');
            $table->foreign('projects_id')->references('id')->on('projects')->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_timesheets');
    }
}
