<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('bit_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('amount'); // Positive for earned, negative for spent
            $table->integer('balance_after');
            $table->enum('source_type', ['task', 'order', 'manual'])->default('task');
            $table->unsignedBigInteger('source_id')->nullable(); // task_id or order_id
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bit_transactions');
    }
}
