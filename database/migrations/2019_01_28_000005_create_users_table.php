<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('user_id');
            $table->string('first_name', 45);
            $table->string('middle_name', 45)->nullable();
            $table->string('last_name', 45);
            $table->string('email', 128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedInteger('user_role_id');
            $table->date('date_hired');
            $table->unsignedTinyInteger('active');
            $table->unsignedInteger('function_id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('company_id');
            $table->timestampsTz();
            $table->softDeletes();

            
            $table->index(["user_role_id"], 'users_fk_user_role_id1_idx');

            $table->index(["department_id"], 'users_fk_department_id_idx');

            $table->index(["company_id"], 'users_fk_company_id_idx');

            $table->index(["function_id"], 'users_fk_function_id_idx');

            $table->unique(["user_id"], 'worker_id_UNIQUE');


            $table->foreign('function_id', 'users_fk_function_id_idx')
                ->references('function_id')->on('functions')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('user_role_id', 'users_fk_user_role_id1_idx')
                ->references('user_role_id')->on('user_roles')
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
