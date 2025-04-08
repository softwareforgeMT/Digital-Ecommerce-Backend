<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('ticket_id')->unique()->after('id');
        });

        // Generate ticket IDs for existing tickets
        DB::table('tickets')->orderBy('id')->each(function ($ticket) {
            DB::table('tickets')
                ->where('id', $ticket->id)
                ->update(['ticket_id' => \App\Models\Ticket::generateTicketID()]);
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('ticket_id');
        });
    }
};
