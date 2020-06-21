<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('topic_id')->index()->nullable();
            $table->foreign('topic_id')->references('id')->on('topics');

            $table->unsignedBigInteger('author_id')->index()->nullable();
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // $table->dropForeign(['topic_id']);
            $table->dropColumn('topic_id');
        });

        Schema::table('posts', function (Blueprint $table) {
            // $table->dropForeign(['author_id']);
            $table->dropColumn('author_id');
        });
    }
}
