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
        Schema::create('temporary_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('partner_order_no')->nullable();
            $table->text('cart_items')->nullable();
            $table->text('cart_total')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_method')->nullable(); 

            $table->string('coupon_code')->nullable();
            $table->string('coupon_own_type')->nullable();
            $table->decimal('coupon_percentage', 5, 2)->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('temporary_orders');
    }
};
