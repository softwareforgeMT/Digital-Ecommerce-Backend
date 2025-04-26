<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitTasksTable extends Migration
{
    public function up()
    {
        Schema::create('bit_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('bit_value')->default(0); // Points awarded
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('required_proof')->nullable(); // What users need to submit
            $table->integer('max_submissions')->nullable(); // Optional limit per user
            $table->integer('total_submissions')->default(0); // Track total submissions
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bit_tasks');
    }
}
