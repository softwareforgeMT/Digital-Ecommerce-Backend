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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('order_id')->nullable();
            $table->string('item_type')->nullable();
            $table->unsignedTinyInteger('item_id')->nullable();
            $table->unsignedTinyInteger('quantity')->nullable();

            $table->text('access_sections')->nullable(); 
            
            $table->decimal('price', 8, 2)->nullable();
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
        Schema::dropIfExists('order_items');
    }
};
