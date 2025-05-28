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
        Schema::create('train', function (Blueprint $table) {
            $table->id('train_id');
            $table->string('train_name');
            $table->string('departure')->nullable();
            $table->string('arrival')->nullable();
            $table->string('status')->default('scheduled');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('train');
    }
};
