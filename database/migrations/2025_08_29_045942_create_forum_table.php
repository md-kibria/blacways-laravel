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
        Schema::create('forum', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title')->nullable(); // Post title
            $table->string('thumbnail')->nullable(); // For future update
            $table->text('content'); // Post content
            $table->integer('views')->default(0); // Optional view counter
            $table->enum('status', ['solved', 'open'])->default('open'); // Post content
            $table->boolean('is_approved')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum');
    }
};
