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
        Schema::create('imputations', function (Blueprint $table) {
            $table->id();
            $table->Integer('UserImpute_id')->nullable();
            //$table->foreign('UserImpute_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->Integer('service_id')->nullable();
            //$table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');


            $table->unsignedBigInteger('instruction_id');
            $table->foreign('instruction_id')->references('id')->on('instructions')->onDelete('cascade');

            $table->string('decision');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        schema::table('imputations', function (Blueprint $table) {
            $table->dropForeign(['UserImpute_id', 'instruction_id']);
            $table->dropForeign(['UserImpute_id', 'instruction_id']);
        });

        Schema::dropIfExists('imputations');
    }
};
