<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DailyTimesheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('daily_timesheets', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('project_id');
                $table->integer('user_id');
                $table->string('date');
                // limit of 3 total digits including 1 decimal digit
                $table->float('hours', 3, 1);
                $table->string('notes') -> nullable();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dailytimesheet');
    }
}
