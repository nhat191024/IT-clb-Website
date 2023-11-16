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
        Schema::create('projects', function (Blueprint $table) {
            $table->string('Id')->primary();
            $table->string('Name');
            $table->string('Image');
            $table->date('StartDate');
            $table->time('WorkTime')->nullable();
            $table->date('EndDate');
            $table->string('ProjectSrc')->nullable();
            $table->string('Status');
            $table->text('Description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
