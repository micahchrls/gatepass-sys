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
        Schema::create('violations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gatepass_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('person_id')->constrained('people')->onDelete('cascade');
            $table->foreignId('vehicle_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('violation_type');
            $table->text('notes')->nullable();
            $table->enum('severity', ['minor', 'major'])->default('minor');
            $table->unsignedBigInteger('recorded_by');
            $table->timestamp('occurred_at');
            $table->timestamps();

            // Foreign key for recorded_by
            $table->foreign('recorded_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('violations');
    }
};
