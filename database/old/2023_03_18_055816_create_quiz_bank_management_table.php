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
        Schema::create('quiz_bank_management', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->string('position')->nullable();
            $table->string('assessment_stage')->nullable();
            $table->string('program')->nullable();
            $table->longtext('details')->nullable();
            $table->longtext('quiz_group_names')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->text('subplan_ids')->nullable();
            $table->string('assessment_type')->nullable();
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
        Schema::dropIfExists('quiz_bank_management');
    }
};
