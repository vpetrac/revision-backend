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
        Schema::create('revisions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->date('planned_start_of_internal_revision')->nullable();
            $table->date('actual_start_of_internal_revision')->nullable();
            $table->date('planned_draft_of_revision_report')->nullable();
            $table->date('actual_draft_of_revision_report')->nullable();
            $table->date('planned_final_revision_report')->nullable();
            $table->date('actual_final_revision_report')->nullable();
            $table->text('revision_goals_descrption')->nullable();
            $table->json('revision_goals')->nullable();
            $table->text('revision_scope')->nullable();
            $table->text('report_users')->nullable();
            $table->text('control_system')->nullable();
            $table->text('revision_plans')->nullable();
            $table->text('deviation_reasons')->nullable();
            $table->json('subjects')->nullable();
            $table->text('supervisor')->nullable();
            $table->text('auditTeamHead')->nullable();
            $table->json('auditTeamMembers')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisions');
    }
};
