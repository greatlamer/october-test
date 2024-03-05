<?php namespace TestAuthor\TestPlugin2\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('testauthor_testplugin2_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('author')->default('');
            $table->string('content', 500)->default('');
            $table->boolean('visible')->default(true);
            $table->integer('id_sect');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testauthor_testplugin2_posts');
    }
}
