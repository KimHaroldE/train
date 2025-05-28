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
        Schema::create('passenger', function (Blueprint $table) {
            $table->id('passenger_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();  
            $table->string('password');
            $table->unsignedBigInteger('train_id')->nullable();
            $table->timestamps();
            $table->foreign('train_id')->references('train_id')->on('train')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passenger');
    }
};
