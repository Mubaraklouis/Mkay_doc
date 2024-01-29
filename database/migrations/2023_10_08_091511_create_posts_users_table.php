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



            $table->foreignId('user_id')->index();
            $table->foreignId('post_id')->index();
            $table->foreign('post_id')->on('posts')->references('id')->casecadeOnDelete();
            $table->foreign('user_id')->on('users')->references('id')->casecadeOnDelete();
            $table->primary(['user_id','post_id']);
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
