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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('jobs_applied')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->string('service_line')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('job_id')->nullable();
            $table->text('instruction_form')->nullable();
            $table->text('resume')->nullable();
            $table->text('motivation_letter')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            // Add other fields based on your form

            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('job_id')->references('id')->on('job_listings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
};
