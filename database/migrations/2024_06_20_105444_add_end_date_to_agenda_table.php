<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEndDateToAgendaTable extends Migration
{
    public function up()
    {
        Schema::table('agenda', function (Blueprint $table) {
            $table->date('end_date')->nullable()->after('date');
        });
    }

    public function down()
    {
        Schema::table('agenda', function (Blueprint $table) {
            $table->dropColumn('end_date');
        });
    }
}

