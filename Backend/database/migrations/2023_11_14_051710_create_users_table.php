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
            $table->string('Name', 30);
            $table->date('Birthday');
            $table->date('JoinDate');
            $table->unsignedBigInteger('Major');
            $table->unsignedBigInteger('Course');
            $table->string('Phone')->nullable();
            $table->string('Avatar')->nullable();
            $table->boolean('Active');
            $table->json('SocialAccount')->nullable();
            $table->string('Role', 1);
            $table->string('username');
            $table->string('Email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('Major')->references('Id')->on('majors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('Course')->references('Id')->on('courses')->onUpdate('cascade')->onDelete('restrict');
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
