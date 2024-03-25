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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            $table->unsignedInteger('importance')->nullable();
            $table->string('status')->nullable();
            $table->text('activities')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('partner')->nullable();
            $table->text('responsible_users')->nullable();
            $table->text('deadline')->nullable();
            $table->date('real_deadline')->nullable();
            $table->date('finished_date')->nullable();
            $table->boolean('finished_date_concluded')->default(false);
            $table->date('finished_date_confirmed')->nullable();
            $table->boolean('finished_date_confirmed_concluded')->default(false);
            $table->unsignedBigInteger('revision_id'); // Foreign key to revisions table
            $table->unsignedBigInteger('finding_id'); // Foreign key to revisions table
            $table->timestamps();

            $table->foreign('revision_id')->references('id')->on('revisions')->onDelete('cascade');
            $table->foreign('finding_id')->references('id')->on('findings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
