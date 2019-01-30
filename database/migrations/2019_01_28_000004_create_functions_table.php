<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     * @table functions
     *
     * @return void
     */
    public function up()
    {
        Schema::create('functions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('function_id');
            
            // Indexes
            $table->unsignedInteger('department_id')->index();

            $table->string('function_name', 45)->collation('utf8_unicode_ci');
            $table->timestampsTz();
            $table->softDeletes();
            
            // Foreign Keys
            $table->foreign('department_id', 'functions_fk_department_id')
                  ->references('department_id')->on('departments')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('functions');
     }
}