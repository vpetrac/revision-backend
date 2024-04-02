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
        Schema::create('survey_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token', 64)->unique(); // A unique token for the survey link
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('revision_id')->constrained()->onDelete('cascade');
            $table->boolean('used')->default(false); // To check if the token has been used
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_tokens');
    }
};
