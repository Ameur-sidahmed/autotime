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
        Schema::create('rendezvouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_controle_tech');
            $table->unsignedBigInteger('id_client');
            $table->string('prenom');
            $table->string('nom');
            $table->string('email');
            $table->integer('telephone');
            $table->string('modele');
            $table->string('nomv');
            $table->integer('matricule');
            $table->string('type');
            $table->string('message');
            $table->string('creneau');
            $table->boolean('status')->default(true);
            $table->foreign('id_controle_tech')->references('id')->on('controle_teches');
            $table->foreign('id_client')->references('id')->on('clients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendezvouses');
    }
};
