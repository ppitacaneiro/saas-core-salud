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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('document_type')->nullable();
            $table->string('document_number')->unique()->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['H', 'M', 'O'])->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
