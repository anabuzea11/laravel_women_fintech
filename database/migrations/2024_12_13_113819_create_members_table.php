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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nume membru
            $table->string('email')->unique(); // Email unic
            $table->string('profession'); // Profesie
            $table->string('company')->nullable(); // Companie, opțional
            $table->string('linkedin_url')->nullable(); // LinkedIn URL, opțional
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status cu valoare implicită
            $table->timestamps(); // Coloane created_at și updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
