<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // create_members_table migration
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('section');
            $table->date('annif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
