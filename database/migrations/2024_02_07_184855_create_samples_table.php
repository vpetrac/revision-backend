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
            $table->text('sample_name');
            $table->text('population_size')->nullable();
            $table->text('sampling_method')->nullable();
            $table->text('sample_size')->nullable();
            $table->text('collection_method')->nullable();
            $table->text('method_explanation')->nullable();
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
