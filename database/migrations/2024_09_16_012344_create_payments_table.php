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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Associate payment with a user
            $table->enum('payment_type', ['subscription', 'ad_unlock', 'other'])->default('other'); // Type of payment
            $table->unsignedBigInteger('reference_id')->nullable(); // Reference to subscription, ad unlock, or other entity
            $table->string('payment_method');
            $table->decimal('amount', 10, 2);
            $table->string('payment_id')->unique(); // External payment processor ID
            $table->enum('status', ['pending', 'completed', 'failed']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
