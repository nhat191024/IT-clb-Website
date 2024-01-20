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
            $table->string('username', 40);
            $table->string('password', 20);
            $table->string('name', 30);
            $table->string('avatar')->nullable();
            $table->date('birthday');
            $table->date('JoinDate');
            $table->unsignedBigInteger('MajorId');
            $table->unsignedBigInteger('CourseId');
            $table->string('phone', 15)->nullable();
            $table->boolean('active');
            $table->json('socialAccount')->nullable();
            $table->string('Role', 1);
            $table->string('Email', 30)->unique();
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
