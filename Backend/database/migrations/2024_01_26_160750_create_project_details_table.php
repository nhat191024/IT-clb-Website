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
            $table->text('description');
            $table->string('projectSrc', 50);
            $table->tinyInteger('status');
            $table->boolean('show')->default(false);
            $table->date('startDate');
            $table->date('endDate');
            $table->timestamps();

            $table->foreign('leaderID')->references('id')->on('user')->onUpdate('cascade')->onDelete('restrict');
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
