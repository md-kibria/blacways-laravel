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
        Schema::create('forum_comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');

            // Add cascade delete (recommended)
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('forum_id')
                  ->constrained('forum') // if your table is 'forum', not 'forums'
                  ->onDelete('cascade');

            $table->enum('status', ['approved', 'rejected'])->default('approved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forum_comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['forum_id']);
        });

        Schema::dropIfExists('forum_comments');
    }
};
