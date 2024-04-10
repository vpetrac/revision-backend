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
        Schema::create('control_lists', function (Blueprint $table) {
            $table->id();
            $table->json('content'); // This will store your questions and answers.
            $table->foreignId('revision_id')->constrained(); // Assuming you have a revisions table.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control_lists');
    }
};
