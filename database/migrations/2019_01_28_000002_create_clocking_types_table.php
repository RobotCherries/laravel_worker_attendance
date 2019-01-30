<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClockingTypesTable extends Migration
{
    /**
     * Run the migrations.
     * @table clocking_types
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clocking_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('clocking_type_id');
            
            $table->string('clocking_type_tag', 10)->unique()->collation('utf8_unicode_ci');
            $table->string('clocking_type', 45)->unique()->collation('utf8_unicode_ci');
            $table->timestampsTz();
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
       Schema::dropIfExists('clocking_types');
     }
}
