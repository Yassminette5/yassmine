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
            Schema::create('lecons', function (Blueprint $table) {
        $table->id();
        $table->foreignId('formation_id')->constrained('formations')->onDelete('cascade');
        $table->string('titre');
        $table->text('contenu')->nullable();
        $table->date('date_creation')->nullable();
        $table->string('pdf_file_name')->nullable();
        $table->timestamps();
    });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecons');
    }
};
