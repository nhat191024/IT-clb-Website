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
        Schema::create('projectDetail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projectId');
            $table->unsignedBigInteger('leaderId');
            $table->unsignedBigInteger('typeId');
            $table->unsignedBigInteger('languageId');
            $table->unsignedBigInteger('frameworkId');
            $table->unsignedBigInteger('memberListId');
            $table->text('description');
            $table->string('projectSrc');
            $table->smallInteger('status');
            $table->boolean('show');
            $table->date('startDate');
            $table->date('endDate');
            $table->timestamps();
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
