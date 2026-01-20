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
        Schema::create('school_years', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., 2025-2026
            $table->date('starts_at');
            $table->date('ends_at');
            $table->boolean('is_active')->default(false); // only one should be active at a time
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_years');
    }
};
