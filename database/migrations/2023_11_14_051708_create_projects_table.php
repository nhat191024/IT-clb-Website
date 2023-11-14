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
            $table->string('IdProjectMember');
            $table->date('StartDate');
            $table->time('WorkTime');
            $table->date('EndDate');
            $table->string('ProjectSrc');
            $table->string('Status');
            $table->string('IdTaskList');
            $table->text('Description');
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
