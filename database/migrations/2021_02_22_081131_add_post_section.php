<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostSection extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('post_sections', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->longText('text');
    });

    Schema::table('post_sections', function (Blueprint $table) {
      $table->unsignedBigInteger('post_id')->index();
      $table->foreign('topic_id')->references('id')->on('posts');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //
  }
}
