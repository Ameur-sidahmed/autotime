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
        Schema::create('planings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_controle_tech');
            //$table->tinyInteger('creneau', ['Dimanche_8', 'Lundi_8', 'Mardi_8', 'Mercredi_8', 'Jeudi_8','Dimanche_9', 'Lundi_9', 'Mardi_9', 'Mercredi_9', 'Jeudi_9','Dimanche_10', 'Lundi_10', 'Mardi_10', 'Mercredi_10', 'Jeudi_10','Dimanche_11', 'Lundi_11', 'Mardi_11', 'Mercredi_11', 'Jeudi_11','Dimanche_12', 'Lundi_12', 'Mardi_12', 'Mercredi_12', 'Jeudi_12'])->default(1);
            $table->boolean('Dimanche_8')->default(true);
            $table->boolean('Lundi_8')->default(true);
            $table->boolean('Mardi_8')->default(true);
            $table->boolean('Mercredi_8')->default(true);
            $table->boolean('Jeudi_8')->default(true);
            $table->boolean('Dimanche_9')->default(true);
            $table->boolean('Lundi_9')->default(true);
            $table->boolean('Mardi_9')->default(true);
            $table->boolean('Mercredi_9')->default(true);
            $table->boolean('Jeudi_9')->default(true);
            $table->boolean('Dimanche_10')->default(true);
            $table->boolean('Lundi_10')->default(true);
            $table->boolean('Mardi_10')->default(true);
            $table->boolean('Mercredi_10')->default(true);
            $table->boolean('Jeudi_10')->default(true);
            $table->boolean('Dimanche_11')->default(true);
            $table->boolean('Lundi_11')->default(true);
            $table->boolean('Mardi_11')->default(true);
            $table->boolean('Mercredi_11')->default(true);
            $table->boolean('Jeudi_11')->default(true);
            $table->boolean('Dimanche_12')->default(true);
            $table->boolean('Lundi_12')->default(true);
            $table->boolean('Mardi_12')->default(true);
            $table->boolean('Mercredi_12')->default(true);
            $table->boolean('Jeudi_12')->default(true);
            $table->foreign('id_controle_tech')->references('id')->on('controle_teches');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planings');
    }
};
