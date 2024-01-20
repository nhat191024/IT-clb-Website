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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('task', 40);
            $table->unsignedBigInteger('projectId');
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('memberId')->nullable();
            $table->timestamps();

            $table->foreign('projectId')->references('Id')->on('project')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('memberId')->references('Id')->on('user')->onUpdate('cascade')->onDelete('set null');
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
