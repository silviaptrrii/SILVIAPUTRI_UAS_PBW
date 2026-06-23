<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('outfit_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outfit_id')->constrained('outfits')->cascadeOnDelete();
            $table->foreignId('clothes_id')->constrained('clothes')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['outfit_id', 'clothes_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outfit_details');
    }
};
