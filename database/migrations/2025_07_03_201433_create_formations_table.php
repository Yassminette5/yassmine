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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->string('duree');
            $table->string('niveau');
            $table->date('date_creation')->nullable();
            $table->decimal('prix', 8, 2);
            $table->string('image_name')->nullable();
            $table->foreignId('instructeur_id')->constrained('users')->onDelete('cascade');
            $table->string('statut')->default('en attente');
            $table->timestamps(); // => created_at + updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
