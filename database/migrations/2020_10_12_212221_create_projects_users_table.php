<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_users', function (Blueprint $table) {
            $table->bigIncrements('id');        
            $table->string('user_id');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');

            $table->string('project_id');
            $table->foreignId('project_id')
                ->references('id')
                ->on('projects')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_users');
    }
}
