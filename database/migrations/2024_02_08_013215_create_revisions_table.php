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

            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->unsignedBigInteger('audit_team_head_id')->nullable();

            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('set null');
            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('audit_team_head_id')->references('id')->on('users')->onDelete('set null');

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
