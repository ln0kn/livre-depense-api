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
        Schema::create('charge_fixes', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->integer('montant');
            $table->integer('quantite');
            $table->integer('periodisite')->comment('nombre de fois par trimestre ou par moi?');
            $table->foreignUlid('article_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charge_fixes');
    }
};
