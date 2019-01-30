<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        DB::table('user_roles')->insert([
            'user_role' => 'Admin',
        ]);

        // Manager
        DB::table('user_roles')->insert([
            'user_role' => 'Manager',
        ]);

        // Worker
        DB::table('user_roles')->insert([
            'user_role' => 'Worker',
        ]);
    }
}
