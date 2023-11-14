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
            $table->date('Birth');
            $table->date('JoinDate');
            $table->string('StudentId');
            $table->string('MajorId');
            $table->string('CourseId');
            $table->string('Mail');
            $table->string('Avatar');
            $table->string('Username');
            $table->string('Password');
            $table->boolean('ActiveStatus');
            $table->json('SocialAccount');
            $table->string('Role');
            $table->timestamps();
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
