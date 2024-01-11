<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectTable extends Migration
{
    public function up()
    {
        Schema::create('db_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->constrained(); // Assuming a foreign key to the managers table
            $table->string('system_owner');
            $table->string('system_pic');
            $table->date('start_date');
            $table->integer('duration');
            $table->date('end_date');
            $table->string('status');
            $table->foreignId('lead_developer_id')->nullable()->constrained(); // Assuming a foreign key to the lead_developers table
            $table->string('methodology');
            $table->string('platform');
            $table->string('deployment_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
