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
        $table->foreignId('categorie_id')->constrained('categories');
        $table->string('titre');
        $table->text('description');
        $table->string('duree')->nullable();
        $table->string('niveau')->nullable();
        $table->date('date_creation')->nullable();
        $table->decimal('prix', 8, 2)->nullable();
        $table->string('image_name')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foarmation_');
    }
};
