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
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->string('sample_name');
            $table->integer('population_size');
            $table->string('sampling_method');
            $table->integer('sample_size');
            $table->string('collection_method');
            $table->text('method_explanation');
            $table->unsignedBigInteger('revision_id'); // Foreign key to revisions table

            $table->foreign('revision_id')->references('id')->on('revisions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('samples');
    }
};
