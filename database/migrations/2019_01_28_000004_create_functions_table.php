<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'functions';

    /**
     * Run the migrations.
     * @table functions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('function_id');
            $table->string('function_name', 45);
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('company_id');
            $table->timestampTz();
            $table->softDeletes();

            $table->index(["department_id"], 'functions_fk_department_id_idx');

            $table->index(["company_id"], 'functions_fk_company_id_idx');

            $table->unique(["function_id"], 'function_id_UNIQUE');

            $table->unique(["function_name"], 'function_name_UNIQUE');


            $table->foreign('department_id', 'functions_fk_department_id_idx')
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
       Schema::dropIfExists($this->tableName);
     }
}
