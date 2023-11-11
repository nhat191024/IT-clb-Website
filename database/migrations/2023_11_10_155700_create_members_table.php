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
            $table->string('MemberId')->primary();
            $table->string('Name');
            $table->string('Surname');
            $table->date('Birth');
            $table->date('JoinDate');
            $table->string('MajorsId');
            $table->String('CourseId');
            $table->string('Mail');
            $table->string('Image');
            $table->string('Username');
            $table->string('Password');
            $table->string('ActiveStatus');
            $table->json('SocialNetworkAccount');
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
