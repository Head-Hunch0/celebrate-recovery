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
        Schema::create('mpesa_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('merchant_request_id');
            $table->string('checkout_request_id');
            $table->string('phone_number');
            $table->decimal('amount', 10, 2);
            $table->string('mpesa_receipt_number')->nullable();
            $table->dateTime('transaction_date')->nullable();
            $table->string('result_code')->nullable();
            $table->string('result_desc')->nullable();
            $table->text('callback_metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpesa_transactions');
    }
};
