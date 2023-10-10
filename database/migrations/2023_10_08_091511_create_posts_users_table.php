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
        Schema::create('posts_users', function (Blueprint $table) {



            $table->foreignId('user_id')->on('users')->reference('id')->casecadeOnDelete;
            $table->foreignId('post_id')->on('posts')->reference('id')->casecadeOnDelete;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_users');
    }
};
