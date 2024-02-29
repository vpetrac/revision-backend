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
        Schema::create('revision_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('revision_id')->unique();
            $table->date('revision_planning_date')->nullable();
            $table->boolean('revision_planning_concluded')->default(false);
            $table->date('revision_completion_date')->nullable();
            $table->boolean('revision_completion_concluded')->default(false);
            $table->date('risk_assessment_date')->nullable();
            $table->boolean('risk_assessment_concluded')->default(false);
            $table->date('testing_program_completion_date')->nullable();
            $table->boolean('testing_program_completion_concluded')->default(false);
            $table->date('testing_results_completion_date')->nullable();
            $table->boolean('testing_results_completion_concluded')->default(false);
            $table->date('sample_selection_date')->nullable();
            $table->boolean('sample_selection_concluded')->default(false);
            $table->date('draft_report_date')->nullable();
            $table->boolean('draft_report_concluded')->default(false);
            $table->date('final_report_date')->nullable();
            $table->boolean('final_report_concluded')->default(false);
            $table->date('checklist_date')->nullable();
            $table->boolean('checklist_concluded')->default(false);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('revision_id')->references('id')->on('revisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revision_approvals');
    }
};
