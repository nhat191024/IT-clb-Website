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
        Schema::create('project_language', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('projects_id');
            $table->unsignedBigInteger('languages_id');
            $table->timestamps();

            $table->foreign('projects_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('languages_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
