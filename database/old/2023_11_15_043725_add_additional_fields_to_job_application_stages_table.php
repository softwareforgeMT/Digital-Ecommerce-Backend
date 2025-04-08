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
        Schema::table('job_application_stages', function (Blueprint $table) {
            $table->json('admin_docs')->nullable();
            $table->boolean('user_docs_required')->default(false);
            $table->json('user_docs')->nullable();
        });
    }

    public function down()
    {
        Schema::table('job_application_stages', function (Blueprint $table) {
            $table->dropColumn('admin_docs');
            $table->dropColumn('user_docs_required');
            $table->dropColumn('user_docs');
        });
    }
};
