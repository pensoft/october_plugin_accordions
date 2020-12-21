<?php namespace Pensoft\Accordions\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftAccordionsItem extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('pensoft_accordions_item')) {
            Schema::create('pensoft_accordions_item', function($table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('prefix', 255)->nullable();
                $table->string('title', 255);
                $table->text('body')->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->integer('category_id');
                $table->integer('sort_order')->nullable();
            });
        }
    }
    
    public function down()
    {
        if (Schema::hasTable('pensoft_accordions_item')) {
            Schema::dropIfExists('pensoft_accordions_item');
        }
    }
}
