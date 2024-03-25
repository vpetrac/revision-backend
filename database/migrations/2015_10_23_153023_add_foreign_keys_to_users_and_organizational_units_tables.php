<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Adding foreign keys to the organizational_units table
        Schema::table('organizational_units', function (Blueprint $table) {
            $table->foreign('head_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('set null');
        });

        // Adding foreign keys to the users table
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('set null');
            $table->foreign('organizational_unit_id')->references('id')->on('organizational_units')->onDelete('set null');
        });
    }

    public function down(): void
    {
        // Dropping foreign keys from the organizational_units table
        Schema::table('organizational_units', function (Blueprint $table) {
            $table->dropForeign(['head_id', 'organization_id']);
        });

        // Dropping foreign keys from the users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['organization_id', 'organizational_unit_id']);
        });
    }
};
