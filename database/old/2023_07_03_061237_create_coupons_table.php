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

         Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->unique();
            $table->string('coupon_name')->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('earnings', 5, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedInteger('usage_count')->default(0);
            $table->unsignedInteger('max_usage_count')->default(0);
            $table->unsignedTinyInteger('status')->default(1);
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
        Schema::dropIfExists('coupons');
    }
};
