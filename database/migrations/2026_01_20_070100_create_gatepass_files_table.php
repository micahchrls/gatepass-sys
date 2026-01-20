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
        Schema::create('gatepass_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gatepass_id')->constrained()->onDelete('cascade');
            $table->string('file_type'); // license, OR, registration, ID, etc.
            $table->string('path');
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->enum('status', ['submitted', 'verified', 'rejected'])->default('submitted');
            $table->timestamps();

            // Foreign key for uploaded_by
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gatepass_files');
    }
};
