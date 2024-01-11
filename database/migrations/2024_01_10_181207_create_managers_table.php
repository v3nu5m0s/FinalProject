<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_managers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('department')->nullable();
            $table->text('address')->nullable();
            $table->string('position')->nullable();
            $table->date('date_of_birth')->nullable();
            // Add more fields as needed

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
        Schema::table('projects', function (Blueprint $table) {
            // Drop the foreign key constraint before dropping the table
            $table->dropForeign(['manager_id']);
        });

        Schema::dropIfExists('managers');
    }
}
