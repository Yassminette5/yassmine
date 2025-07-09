<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formation_id');
            $table->unsignedBigInteger('promotion_id')->nullable();
            $table->dateTime('date_inscription')->default(now());
            $table->string('status')->default('non payé');
            $table->decimal('montant', 8, 2);
            $table->string('type_paiement');
            $table->string('nom_apprenant');
            $table->string('nom_formation');
            $table->string('cin')->nullable();
            $table->string('email');
            $table->unsignedBigInteger('apprenant_id');
            $table->timestamps();

            // Clés étrangères
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
            $table->foreign('apprenant_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}