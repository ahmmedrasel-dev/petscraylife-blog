<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('blog_comments', function (Blueprint $table) {
      $table->id();
      $table->foreignId('post_id');
      $table->string('provider_name');
      $table->string('provider_email');
      $table->text('comments');
      $table->string('status')->default(1)->comment('1= padding, 2=approved');
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
    Schema::dropIfExists('blog_comments');
  }
}
