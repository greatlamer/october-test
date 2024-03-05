<?php namespace TestAuthor\TestPlugin2\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSectsTable extends Migration
{
    public function up()
    {
        Schema::create('testauthor_testplugin2_sects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->default('');
            $table->integer('rank')->default(10);
            $table->boolean('visible')->default(true);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('testauthor_testplugin2_sects');
    }
}
