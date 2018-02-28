<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('cate_id');
            $table->integer('create_by');
            $table->string('title');
            $table->string('summary');
            $table->text('content');
            $table->string('images');
            $table->integer('views')->unsigned();
            $table->integer('status');//trạng thái bài : riêng tư hoặc coogn khai
            $table->integer('option'); // lựa chọn là bài nổi bật hoặc bài hay
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
        Schema::dropIfExists('posts');
    }
}
