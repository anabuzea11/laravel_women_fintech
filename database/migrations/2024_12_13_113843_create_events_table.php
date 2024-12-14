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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Numele evenimentului
            $table->dateTime('event_date'); // Data și ora evenimentului
            $table->text('description')->nullable(); // Descriere eveniment
           // $table->foreignId('member_id')->constrained('members')->onDelete('cascade'); // Relația cu tabelul members
            $table->timestamps(); // Coloane created_at și updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
