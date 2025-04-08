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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedTinyInteger('user_id')->nullable();
            $table->string('order_number')->nullable();

            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('checkout_fee', 8, 2)->nullable();
            $table->decimal('subtotal', 8, 2)->nullable();
            $table->decimal('pay_amount', 8, 2)->nullable();

            $table->string('coupon_code')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_gateway')->nullable();

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
        Schema::dropIfExists('orders');
    }
};
