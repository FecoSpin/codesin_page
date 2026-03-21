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
            $table->string('pageName')->nullable();
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('externalUrl')->nullable();
            $table->string('urlvideo')->nullable();
            $table->string('urlBanner')->nullable();
            $table->string('urlBannerMobile')->nullable();
            $table->string('urlimage')->nullable();
            $table->string('urlimageMobile')->nullable();
            $table->mediumText('excerpt')->nullable();
            $table->mediumText('iframe')->nullable();
            $table->text('body')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
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
