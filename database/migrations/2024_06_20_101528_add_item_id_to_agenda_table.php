<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // add_item_id_to_agenda_table migration
    public function up()
    {
        Schema::table('agenda', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->nullable();

            // Foreign key constraint
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('agenda', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
            $table->dropColumn('item_id');
        });
    }
};
