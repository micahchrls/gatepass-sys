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
        Schema::create('vehicle_people', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('person_id')->constrained('people')->onDelete('cascade');
            $table->enum('role', ['owner', 'guardian', 'driver']);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Prevent duplicate active relationships
            $table->unique(['vehicle_id', 'person_id', 'role']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_people');
    }
};
