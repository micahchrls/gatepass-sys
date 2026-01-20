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
        Schema::create('gatepasses', function (Blueprint $table) {
            $table->id();
            $table->string('gatepass_number')->nullable()->unique(); // nullable until payment/issuance
            $table->foreignId('school_year_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('applicant_person_id')->constrained('people')->onDelete('cascade');
            $table->enum('status', ['pending', 'approved', 'active', 'rejected', 'expired', 'revoked'])->default('pending');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();
            $table->text('remarks')->nullable(); // rejection reason, notes
            $table->timestamps();

            // Foreign key for approved_by
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gatepasses');
    }
};
