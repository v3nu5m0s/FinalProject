<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_unit_id');
            $table->string('pro_id'); // Make sure 'pro_id' is included
            $table->string('name');
            $table->text('description'); // Change to 'text' if description is a longer field
            $table->date('start_date');
            $table->integer('duration');
            $table->date('end_date');
            $table->string('status');
            $table->string('development_overview');
            $table->enum('system_platform', ['web', 'mobile', 'stand-alone']);
            $table->enum('development_methodology', ['agile', 'prototyping', 'waterfall', 'rapid_application_development'])->nullable();
            $table->enum('development_method', ['cloud', 'on-premise']);
            $table->foreignId('lead_developer_id')->nullable();
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('business_unit_id')->references('id')->on('business_units');
            $table->foreign('lead_developer_id')->references('id')->on('developers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
