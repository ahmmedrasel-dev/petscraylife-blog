<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
      $table->id();
      $table->foreignId('category_id');
      $table->string('blog_title');
      $table->string('slug');
      $table->string('thumbnail_image')->nullable();
      $table->string('feature_image')->nullable();
      $table->text('blog_details');
      $table->string('featurepost_status')->default(1)->comment('1=general Post, 2=feature post');
      $table->string('status')->default(1)->comment('active=1, inactive=0');
      $table->string('post_view')->default(0);
      $table->timestamps();
      $table->softDeletes();
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
