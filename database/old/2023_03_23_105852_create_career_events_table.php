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
        Schema::create('career_events', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('event_type')->nullable();
            $table->string('host_name')->nullable();
            $table->string('slug')->nullable();
            $table->string('meeting_id')->nullable();
            $table->dateTime('event_date_time')->nullable();
            $table->text('details')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->text('subplan_ids')->nullable();
            $table->string('photo')->nullable();
            $table->string('intro_video')->nullable(); 
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
        Schema::dropIfExists('career_events');
    }
};
