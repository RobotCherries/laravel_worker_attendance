<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClockingsTable extends Migration
{
    /**
     * Run the migrations.
     * @table clockings
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clockings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('clocking_id');
            
            // Indexes
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('user_role_id')->index();
            $table->unsignedInteger('department_id')->index();
            $table->unsignedInteger('function_id')->index();
            $table->unsignedInteger('clocking_type_id')->index();

            $table->boolean('clocking_presence')->default('1');
            $table->date('clocking_date');
            $table->tinyInteger('clocking_hours')->nullable();
            $table->boolean('clocking_overtime')->default('0')->nullable();
            $table->boolean('clocking_weekend')->default('0')->nullable();
            
            $table->timestampsTz();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('user_id', 'clockings_fk_user_id')
                  ->references('user_id')->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict')
                  ->nullable();
                  
            $table->foreign('user_role_id', 'clockings_fk_user_role_id')
                  ->references('user_role_id')->on('user_roles')
                  ->onDelete('restrict')
                  ->onUpdate('restrict')
                  ->nullable();

            $table->foreign('department_id', 'clockings_fk_department_id')
                  ->references('department_id')->on('departments')
                  ->onDelete('restrict')
                  ->onUpdate('restrict')
                  ->nullable();

            $table->foreign('function_id', 'clockings_fk_function_id')
                  ->references('function_id')->on('functions')
                  ->onDelete('restrict')
                  ->onUpdate('restrict')
                  ->nullable();

            $table->foreign('clocking_type_id', 'clockings_fk_clocking_type_id')
                  ->references('clocking_type_id')->on('clocking_types')
                  ->onDelete('restrict')
                  ->onUpdate('restrict')
                  ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('clockings');
     }
}
