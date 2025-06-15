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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('date_naissance');
            $table->enum('role', ['apprenant', 'instructeur']);
            $table->string('niveau_etude')->nullable();  // seulement si apprenant
            $table->string('cv')->nullable();            // seulement si instructeur
            $table->string('image')->nullable();         // image de profil
            $table->rememberToken();
            $table->timestamps(); // à mettre en bas par convention
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
