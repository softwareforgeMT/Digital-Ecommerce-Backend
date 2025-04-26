<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            
            // Hero Section
            $table->string('hero_badge_text')->nullable();
            $table->string('hero_heading')->nullable();
            $table->string('hero_highlight')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_link')->nullable();
            $table->string('hero_image')->nullable();
            
            // Featured Products Section
            $table->string('featured_title')->nullable();
            $table->string('featured_subtitle')->nullable();
            
            // Categories Section
            $table->string('category_badge')->nullable();
            $table->string('category_title')->nullable();
            $table->string('category_subtitle')->nullable();
            
            // Latest Products Section
            $table->string('latest_badge')->nullable();
            $table->string('latest_title')->nullable();
            $table->string('latest_subtitle')->nullable();
            
            // Section Visibility
            $table->boolean('show_featured')->default(true);
            $table->boolean('show_categories')->default(true);
            $table->boolean('show_latest')->default(true);
            $table->boolean('show_services')->default(true);
            $table->boolean('show_blog')->default(true);
            
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
        Schema::dropIfExists('home_settings');
    }
}
