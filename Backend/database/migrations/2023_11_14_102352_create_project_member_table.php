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
        Schema::create('project_member', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projectId');
            $table->unsignedBigInteger('memberId');
            $table->timestamps();

            $table->foreign('projectId')->references('Id')->on('project')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('memberId')->references('Id')->on('users')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_members');
    }
};
