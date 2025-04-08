<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_application_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_application_id');
            $table->string('stage_name');
            $table->string('status')->nullable();
            $table->date('last_date')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('job_application_id')->references('id')->on('job_applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_application_stages');
    }
};
