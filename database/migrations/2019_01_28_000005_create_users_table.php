<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('user_id');

            // Indexes
            $table->unsignedInteger('user_role_id')->index();
            $table->unsignedInteger('department_id')->index();
            $table->unsignedInteger('function_id')->index();

            $table->string('first_name', 45)->collation('utf8_unicode_ci');
            $table->string('middle_name', 45)->collation('utf8_unicode_ci')->nullable();
            $table->string('last_name', 45)->collation('utf8_unicode_ci');
            
            $table->string('email', 128)->collation('utf8_unicode_ci')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->collation('utf8_unicode_ci');
            $table->rememberToken();

            $table->date('date_hired');
            $table->boolean('active')->default('1');
            $table->timestampsTz();
            $table->softDeletes();

            // Foreign Keys
            $table->foreign('user_role_id', 'users_fk_user_role_id')
                  ->references('user_role_id')->on('user_roles')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
                  
            $table->foreign('department_id', 'users_fk_department_id')
                  ->references('department_id')->on('departments')
                  ->onDelete('restrict')
                  ->onUpdate('restrict')
                  ->nullable();
                  
            $table->foreign('function_id', 'users_fk_function_id')
                  ->references('function_id')->on('functions')
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
       Schema::dropIfExists('users');
     }
}
