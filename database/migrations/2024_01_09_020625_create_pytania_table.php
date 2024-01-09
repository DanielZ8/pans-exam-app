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
        Schema::create('pytania', function (Blueprint $table) {
            $table->id();
            $table->integer('numer_pytania');
            $table->unsignedBigInteger('kategorie_id');
            $table->text('pytanie_tresc');
            $table->text('odp_rozbudowana')->nullable();
            $table->text('odp_krotka')->nullable();
            $table->text('zdj_pytanie')->nullable();
            $table->text('zdj_odpowiedz')->nullable();
            $table->text('typ_pytania');
            $table->timestamps();

            $table->foreign('kategorie_id')->references('id')->on('kategorie') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pytania');
    }
};
