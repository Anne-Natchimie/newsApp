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
        Schema::table('news', function (Blueprint $table) {

            // Creéation d'une table non signée grande en titre avec une valeur par défaut de 1
            $table->unsignedBigInteger('user_id')->default(1) ;

            // Users id est la clé étrangère de la colonne id 
            $table->foreign('user_id')->references('id')->on('users') ;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
};
