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
        Schema::create('bahan_resep', function (Blueprint $table) {
            $table->foreignId('bahan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('resep_id')->constrained()->cascadeOnDelete();
            $table->primary(['bahan_id', 'resep_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
