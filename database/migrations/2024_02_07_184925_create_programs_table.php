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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('possible_risk_causes')->nullable();
            $table->string('possible_risk_consequences')->nullable();
            $table->string('expected_controls')->nullable();
            $table->string('existing_controls')->nullable();
            $table->string('test_purpose')->nullable();
            $table->string('testing_method')->nullable();
            $table->text('testing_questions')->nullable(); // Assuming this could be a longer text.
            $table->text('testing_results')->nullable(); // Same as above.
            $table->text('conclusions_for_drafting_report')->nullable(); // Same as above.
            $table->text('references_to_working_documents')->nullable(); // Same as above.
            $table->integer('effect_value')->nullable(); // Same as above.
            $table->integer('probability_value')->nullable(); // Same as above.
            $table->text('risk_description')->nullable(); // Same as above.
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
        Schema::dropIfExists('programs');
    }
};
