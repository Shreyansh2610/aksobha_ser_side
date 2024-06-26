<?php

use Illuminate\Database\Eloquent\SoftDeletes;
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
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->tinyInteger('is_admin')->default(0);
            $table->string('whatsapp_number_country_code')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_pic')->nullable();
            $table->string('taking_medicine')->nullable();
            $table->string('city');
            $table->longText('taking_medication');
            $table->longText('accept_waiver_actions');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        // Schema::create('password_reset_tokens', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->string('user_id');
        //     $table->string('token');
        //     $table->timestamp('created_at');
        //     $table->softDeletes();
        // });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->bigInteger('id')->primary()->autoIncrement();
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
            $table->softDeletes();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
            $table->softDeletes();

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
