<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('system_owner');
            $table->string('system_pic');
            $table->date('start_date');
            $table->integer('duration');
            $table->date('end_date');
            $table->string('status');
            $table->string('lead_developer');
            $table->text('developers');
            $table->string('dev_methodology');
            $table->string('system_platform');
            $table->string('deployment_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
