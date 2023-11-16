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
        Schema::create('members', function (Blueprint $table) {
            $table->string('Id')->primary();
            $table->string('Name');
            $table->string('Surname');
            $table->date('Birthday');
            $table->date('JoinDate');
            $table->unsignedBigInteger('Major');
            $table->unsignedBigInteger('Course');
            $table->string('Mail');
            $table->integer('Phone')->nullable();
            $table->string('Avatar')->nullable();
            $table->string('Username');
            $table->string('Password');
            $table->boolean('Active');
            $table->json('SocialAccount')->nullable();
            $table->string('Role');
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
        Schema::dropIfExists('members');
    }
};
