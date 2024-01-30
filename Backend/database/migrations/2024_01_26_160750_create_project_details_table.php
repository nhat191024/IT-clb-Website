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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leaderID');
            $table->unsignedBigInteger('projectID');
            $table->text('description')->nullable();
            $table->string('projectSrc', 50)->nullable();
            $table->tinyInteger('status', false)->default('0');
            $table->boolean('show')->default(false);
            $table->date('startDate');
            $table->date('endDate');
            $table->timestamps();

            $table->foreign('leaderID')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('projectID')->references('id')->on('projects')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_details');
    }
};
