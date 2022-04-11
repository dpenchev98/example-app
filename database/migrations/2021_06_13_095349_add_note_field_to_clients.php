<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoteFieldToClients extends Migration
{
    public function up()
    {
        Schema::table('clients', function(Blueprint $table)
        {
            $table->text('notes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function(Blueprint $table){
            $table->dropColumn('notes');
    });
    }
}
