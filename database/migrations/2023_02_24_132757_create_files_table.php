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
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'user_file_user_idx');
            $table->foreign('user_id', 'user_file_user_fk')
                ->on('users')->references('id');

            $table->unsignedBigInteger('comment_id')->nullable();
            $table->index('comment_id', 'comment_file_user_idx');
            $table->foreign('comment_id', 'comment_file_user_fk')
                ->on('comments')->references('id');

            $table->text('url');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
