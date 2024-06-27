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
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->string('cellphone');
            $table->enum('role', ['admin', 'manage', 'user'])->default('user');
            $table->string('photo')->nullable();
            $table->string('password');
            $table->boolean('change_password')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('blocked_at')->nullable();
            $table->timestamp('last_access')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
