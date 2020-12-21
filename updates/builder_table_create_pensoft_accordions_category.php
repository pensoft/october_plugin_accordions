<?php namespace Pensoft\Accordions\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftAccordionsCategory extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('pensoft_accordions_category')) {
            Schema::create('pensoft_accordions_category', function($table)
            {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->string('name', 255);
                $table->string('slug', 255);
                $table->text('body')->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
    }
    
    public function down()
    {
        if (Schema::hasTable('pensoft_accordions_category')) {
            Schema::dropIfExists('pensoft_accordions_category');
        }
    }
}
