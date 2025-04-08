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
        Schema::create('career_event_registrations', function (Blueprint $table) {
            $table->id();
            
            $table->string('registration_id')->nullable();
            $table->unsignedTinyInteger('user_id')->nullable();
            $table->unsignedTinyInteger('event_id')->nullable();
            
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
        Schema::dropIfExists('career_event_registrations');
    }
};
