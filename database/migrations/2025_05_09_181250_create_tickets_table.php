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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            // personal information
            // $table->foreignId('userID')->constrained('users')->onDelete('cascade');

            $table->string('userID')->nullable();
            // ticket information
            $table->string('ticket_type');
            $table->decimal('price', 10, 2);
            $table->integer('quantity')->default(1);
            $table->string('ticket_number')->unique();
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'refunded'])->default('pending');

            // Payment information
            $table->enum('payment_method', ['card', 'mpesa', 'paypal']);
            $table->enum('payment_status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->string('payment_reference')->nullable();
            $table->decimal('payment_amount', 10, 2);
            $table->string('currency')->default('KES');
            $table->timestamp('payment_date')->nullable();

            // M-Pesa specific fields
            $table->string('mpesa_receipt_number')->nullable();
            $table->string('mpesa_phone_number')->nullable();
            $table->timestamp('mpesa_transaction_date')->nullable();

            // PayPal specific fields
            $table->string('paypal_transaction_id')->nullable();
            $table->string('paypal_payer_id')->nullable();
            $table->string('paypal_payer_email')->nullable();

            // Card payment fields
            $table->string('card_last_four')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_expiry')->nullable();

            // Additional timestamps
            $table->timestamp('purchased_at')->nullable();
            $table->timestamp('checked_in_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->decimal('refund_amount', 10, 2)->nullable();

            // Admin fields
            $table->text('refund_reason')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('ticket_number');
            $table->index('payment_reference');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
