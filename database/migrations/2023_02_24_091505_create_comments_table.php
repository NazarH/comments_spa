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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'user_comment_user_idx');
            $table->foreign('user_id', 'user_comment_user_fk')
                ->on('users')->references('id');
            
            $table->string('email');
            $table->text('text');

            $table->unsignedBigInteger('answer_id')->nullable();
            $table->index('answer_id', 'comment_comment_user_idx');
            $table->foreign('answer_id', 'comment_comment_user_fk')
                ->on('comments')->references('id');

            $table->unsignedBigInteger('main_id')->nullable();
            $table->index('main_id', 'main_comment_comment_user_idx');
            $table->foreign('main_id', 'main_comment_comment_user_fk')
                ->on('comments')->references('id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('comments');
    }
};
