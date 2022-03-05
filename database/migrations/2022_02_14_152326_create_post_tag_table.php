<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('tag_id'); //この行を追加
            $table->unsignedInteger('post_id'); //この行を追加
            //$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade'); //この行を追加
            //$table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade'); //この行を追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
