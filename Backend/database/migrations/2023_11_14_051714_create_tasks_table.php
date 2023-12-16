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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('Task');
            $table->string('Project');
            $table->boolean('Status')->default(false);
            $table->unsignedBigInteger('WorkMember')->nullable();
            $table->timestamps();

            $table->foreign('Project')->references('Id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('WorkMember')->references('Id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
