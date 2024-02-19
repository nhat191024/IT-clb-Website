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
            $table->unsignedBigInteger('project_details_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('project_details_id')->references('id')->on('project_details')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
