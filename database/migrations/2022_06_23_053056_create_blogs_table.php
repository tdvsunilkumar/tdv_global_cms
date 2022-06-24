<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('blog_name')->nullable();
            $table->string('blog_title')->nullable();
            $table->string('blog_description')->nullable();
            $table->longText('blog_content')->nullable();
            $table->string('blog_image')->nullable();
            $table->string('blog_slug')->nullable();
            $table->boolean('is_feature')->comment('1=>Yes,0=>No');
            $table->string('blog_tags')->nullable();
            $table->integer('theme_id');
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
        Schema::dropIfExists('blogs');
    }
}
