<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'departments';

    /**
     * Run the migrations.
     * @table departments
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('department_id');
            $table->string('department_name', 45);
            $table->unsignedInteger('company_id');
            $table->timestampTz();
            $table->softDeletes();
            
            $table->index(["company_id"], 'departments_fk_company_id_idx');

            $table->unique(["department_id"], 'id_department_UNIQUE');

            $table->unique(["department_name"], 'department_name_UNIQUE');


            $table->foreign('company_id', 'departments_fk_company_id_idx')
                ->references('company_id')->on('companies')
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
