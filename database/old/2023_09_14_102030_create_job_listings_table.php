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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('service_line')->nullable();
            $table->string('program')->nullable();
            $table->string('location')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->date('last_date')->nullable(); // You can use 'date' or 'timestamp' depending on your needs
            $table->string('job_link')->nullable();
            $table->string('photo')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies'); // Assuming a 'companies' table for company information
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_listings');
    }
};
