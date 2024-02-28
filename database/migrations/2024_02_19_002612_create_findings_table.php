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
        Schema::create('findings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('recommendations')->nullable();
            $table->unsignedInteger('importance')->nullable();
            $table->string('status');
            $table->text('activities')->nullable();
            $table->string('responsibility');
            $table->date('deadline')->nullable();
            $table->date('real_deadline')->nullable();
            $table->date('finished_date')->nullable();
            $table->date('finished_date_confirmed')->nullable();
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
        Schema::dropIfExists('findings');
    }
};
