<?php namespace Pensoft\Accordions\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateTablePensoftAccordionsItem extends Migration
{
    public function up()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->text('title')->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->string('title', 255)->change();
        });
    }
}