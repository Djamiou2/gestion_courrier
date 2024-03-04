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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->string('objet');

            $table->text('contenu');

            $table->string('fichier')->nullable();

            $table->date('date_signature');
            
            $table->date('date_arrivee')->nullable();

            $table->date('date_envoi')->nullable();

            $table->string('delai_de_traitement');

            $table->enum('importance', [
                'important',
                'tres_important',
                'urgent',
                'important_et_urgent'
            ])->default('important')
                ->nullable();

            $table->enum('statut', [
                'en_attente_attribution','attribué',
                'en_attente_d_analyse',
                'en_cours_d_analyse', 'analysé',
            ])->default('en_attente_attribution');

            $table->enum('type', ['entrant', 'sortant', 'interne']);

            $table->Integer('expediteur_id')->nullable();
            //$table->foreign('expediteur_id')->references('id')->on('expediteurs');

            $table->Integer('destinataire_id')->nullable();
            //$table->foreign('destinataire_id')->references('id')->on('expediteurs');

            $table->unsignedBigInteger('nature_id');
            $table->foreign('nature_id')->references('id')->on('nature_courriers')->onDelete('cascade');

            

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('courriers', function (Blueprint $table) {
            $table->dropForeign(['nature_id', 'user_id', 'expediteur_id', 'destinataire_id']);
            $table->dropForeign(['nature_id', 'user_id', 'expediteur_id', 'destinataire_id']);
        });

        Schema::dropIfExists('courriers');
    }
};
