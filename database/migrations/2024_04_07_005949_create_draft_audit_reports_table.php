<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftAuditReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_audit_reports', function (Blueprint $table) {
            $table->id();
            $table->date('draft_date')->nullable(); // Datum nacrta
            $table->text('management_summary')->nullable(); // UPRAVLJAČKI SAŽETAK
            $table->text('audit_opinion')->nullable(); // REVIZORSKO MIŠLJENJE
            $table->text('positive_findings')->nullable(); // pozitivni nalazi
            $table->text('management_comments')->nullable(); // komentar rukovodstva
            $table->text('findings_and_recommendations_summary')->nullable(); // Sažetak nalaza i preporuka
            $table->text('basis_for_implementation_and_audit_period')->nullable(); // Temelj za provedbu i razdoblje provedbe revizije
            $table->text('summary_of_significant_findings_and_recommendations')->nullable(); // SAŽETAK NAJZNAČAJNIJIH NALAZA I PREPORUKA
            $table->unsignedBigInteger('revision_id')->unique();
            $table->foreign('revision_id')->references('id')->on('revisions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draft_audit_reports');
    }
}
