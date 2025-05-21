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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->uuid('uuid')->unique();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('phone_number');
            $table->string('country')->nullable();
            $table->string('county')->nullable();
            $table->string('on_whatsapp')->default(false);
            $table->string('age')->nullable();
            $table->string('church')->nullable();
            $table->string('in_cr_group')->default(false);
            $table->string('cr_group_name')->nullable();
            $table->string('diet')->nullable();
            $table->string('interested_in_starting_cr_group')->default(false);
            $table->string('willing_to_sponsor')->default(false);
            $table->string('password')->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
