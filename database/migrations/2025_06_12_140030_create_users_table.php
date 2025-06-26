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
            $table->string('nom'); // OK : nom obligatoire
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // Ajout : protection contre dates invalides (ex. limite future ?)
            $table->date('date_naissance');

            // Rôle limité à 3 valeurs
            $table->enum('role', ['apprenant', 'instructeur', 'admin'])->default('apprenant');

            // Champs optionnels selon le rôle
            $table->string('niveau_etude')->nullable();  // pour apprenant
            $table->string('cv')->nullable();            // pour instructeur
            $table->string('image')->nullable();         // image de profil

            $table->rememberToken();
            $table->timestamps(); // toujours en bas
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
