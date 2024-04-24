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
        Schema::create('document_fields', function (Blueprint $table) {
            $table->id();
            $table->longText('recommendationPlanSignature')->nullable();
            $table->unsignedBigInteger('revisionId');
            $table->foreign('revisionId')->references('id')->on('revisions')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_fields');
    }
};
