<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); //included by default
            $table->string('slug');
            $table->text('body');
            $table->string('title');
            $table->timestamps(); //included by default. sets "created at" and "updated at" timestamps
            $table->timestamp('published_at')->nullable();//allows post to publish at a later date. this field can be nullified, ie its optional.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
