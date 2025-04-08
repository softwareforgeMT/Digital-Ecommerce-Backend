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
        Schema::create('quiz_banks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('quizbankmanagement_id')->nullable();
            $table->string('quiz_group')->nullable();
            $table->string('slug')->nullable();
            $table->string('question_type')->nullable();

            $table->longtext('external_gallery')->nullable();
            $table->longtext('gallery')->nullable();

            $table->longtext('details')->nullable();
            $table->longtext('options')->nullable();
            $table->longtext('suggested_answer')->nullable();

            $table->string('prepare_time')->nullable();
            $table->string('response_time')->nullable();
            $table->string('promotion_media')->nullable();
            $table->string('promotion_link')->nullable();

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
        Schema::dropIfExists('quiz_banks');
    }
};
