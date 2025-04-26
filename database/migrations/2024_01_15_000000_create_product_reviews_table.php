<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_item_id')->nullable()->constrained()->onDelete('set null');
            $table->integer('rating')->comment('1-5 stars');
            $table->text('review_text')->nullable();
            $table->text('admin_reply')->nullable();
            $table->boolean('verified_purchase')->default(false);
            $table->boolean('approved')->default(false);
            $table->timestamps();
            
            // Ensure a user can only review a product once
            $table->unique(['user_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_reviews');
    }
}
