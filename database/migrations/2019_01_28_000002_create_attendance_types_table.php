<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTypesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'attendance_types';

    /**
     * Run the migrations.
     * @table attendance_types
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('attendance_type_id');
            $table->string('attendance_type_tag', 10);
            $table->string('attendance_type', 45);
            $table->softDeletes();

            $table->unique(["attendance_type"], 'attendance_type_UNIQUE');

            $table->unique(["attendance_type_tag"], 'attendance_type_tag_UNIQUE');

            $table->unique(["attendance_type_id"], 'attendance_type_id_UNIQUE');
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
