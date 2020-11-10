<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_user', function (Blueprint $table) {
            $table->increments('id');
            $table->primary(['user_id', 'projects_id']);

            $table->foreignId('projects_id')->constrained();
            $table->foreignId('user_id')->constrained();

            // $table->unsignedBigInteger('projects_id');
            // $table->foreign('projects_id')->references('id')->on('projects')->onDelete('cascade');

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_user');
    }
}
