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
        Schema::create('replies', function (Blueprint $table) {
            $table->id('reply_id');
            $table->foreignId('thread_id')->constrained('threads' , 'thread_id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users' , 'user_id')->cascadeOnDelete()->nullable();
            $table->text('body');
            $table->timestamps('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
