<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->timestamps(); // Cela ajoute les colonnes created_at et updated_at
        });
    }
    
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropTimestamps(); // Cela supprime les colonnes created_at et updated_at
        });
    }
    
};
