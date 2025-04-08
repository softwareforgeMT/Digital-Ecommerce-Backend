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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            // If a guest can submit, you may allow null; otherwise require user_id
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('subject');
            $table->text('description');
            // Status: open, pending, in-progress, resolved, closed
            $table->enum('status', ['open', 'pending', 'in-progress', 'resolved', 'closed'])->default('open');
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
        Schema::dropIfExists('tickets');
    }
};
