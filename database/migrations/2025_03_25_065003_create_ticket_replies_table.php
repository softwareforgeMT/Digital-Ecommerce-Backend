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
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            // Store the sender’s id (could be user or admin)
            $table->unsignedBigInteger('sender_id')->nullable();
            // 'user' or 'admin'
            $table->string('sender_type', 50);
            $table->text('message');
            // Optional: store attachments as JSON (if multiple files)
            $table->json('attachments')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_replies');
    }
};
