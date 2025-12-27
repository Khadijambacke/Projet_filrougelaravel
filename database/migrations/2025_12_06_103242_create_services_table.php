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
        Schema::create('services', function (Blueprint $table) {
           ///il le met en clees primaires
            $table->id();
            $table->string('titre'); 
            //nullable pas de probleme s'ilest nul
            $table->text('description')->nullable(); 
            $table->decimal('prix', 8, 2)->default(0); 
            $table->integer('duree'); 
            $table->enum('statut', ['actif', 'inactif'])->default('actif'); 
            ///unsignedBigInteger:permet de prendre desvaleurs negatif
            $table->unsignedBigInteger('medecin_id')->nullable(); 
            //timestamps:temps de creation et temps de update
            $table->timestamps();
            ///clee etranger c'est l'inverse de la clee(id_medecin)
            $table->foreign('medecin_id')->references('id')->on('users');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
