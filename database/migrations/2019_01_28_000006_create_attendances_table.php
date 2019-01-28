<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'attendances';

    /**
     * Run the migrations.
     * @table attendances
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('attendance_id');
            $table->unsignedTinyInteger('attendance');
            $table->integer('attendance_date');
            $table->unsignedTinyInteger('attendance_hours');
            $table->unsignedTinyInteger('attendance_overtime')->nullable();
            $table->unsignedTinyInteger('attendance_weekend');
            $table->unsignedInteger('attendance_type_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('user_role_id');
            $table->unsignedInteger('function_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('company_id');
            $table->timestampsTz();
            $table->softDeletes();
            
            $table->index(["attendance_type_id"], 'attendances_fk_attendance_type_id_idx');

            $table->index(["function_id"], 'attendances_fk_function_id_idx');

            $table->index(["user_id"], 'attendances_fk_user_id_idx');

            $table->index(["company_id"], 'attendances_fk_company_id_idx');

            $table->index(["user_role_id"], 'attendances_fk_user_role_id_idx');

            $table->index(["department_id"], 'attendances_fk_departmnet_id_idx');

            $table->unique(["attendance_id"], 'attendance_id_UNIQUE');


            $table->foreign('attendance_type_id', 'attendances_fk_attendance_type_id_idx')
                ->references('attendance_type_id')->on('attendance_types')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('user_id', 'attendances_fk_user_id_idx')
                ->references('user_id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('user_role_id', 'attendances_fk_user_role_id_idx')
                ->references('user_role_id')->on('users')
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
