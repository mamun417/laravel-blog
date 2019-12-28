<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mentioned_id')->default(0);

            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            //$table->unsignedBigInteger('post_id');

            //$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->text('body');
            $table->bigInteger('commentable_id');
            $table->string('commentable_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
