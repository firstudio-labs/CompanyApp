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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('text_banner', 255);
            $table->string('image_banner', 255)->nullable(); 
            $table->string('title', 255)->unique();
            $table->string('subtitle', 255)->nullable(); 
            $table->text('description')->nullable();
            $table->string('image_url', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('website', 255)->nullable(); // Tambahan: website perusahaan
            $table->text('vision')->nullable();  // Tambahan: visi
            $table->text('mission')->nullable(); // Tambahan: misi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
