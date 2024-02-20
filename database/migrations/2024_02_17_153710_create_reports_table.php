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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('theme')->nullable();
            $table->timestamp('datetime')->nullable();
            $table->string('location')->nullable();
            $table->text('attendees')->nullable(); // Considering this could be a JSON string or a long list
            $table->text('absentees')->nullable(); // Same reasoning as above
            $table->string('minutes_taken_by')->nullable();
            $table->string('compiled_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->json('tasks')->nullable(); // Direct JSON field, make sure your DB supports it (MySQL 5.7+, PostgreSQL, etc.)
            $table->longText('content')->nullable(); // Assuming this could be quite lengthy
            $table->unsignedBigInteger('revision_id'); // Foreign key to revisions table
            $table->timestamps();

            $table->foreign('revision_id')->references('id')->on('revisions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
