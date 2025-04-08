<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('pricing_type')->default('subscription');
            $table->decimal('single_price', 10, 2)->nullable();
            $table->integer('access_duration')->nullable();
            $table->json('subscription_plans')->nullable();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['pricing_type', 'single_price', 'access_duration', 'subscription_plans']);
        });
    }
};
