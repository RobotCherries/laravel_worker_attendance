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
            'created_at' => '2019-01-30 12:00:00',
        ]);

        // Manager
        DB::table('user_roles')->insert([
            'user_role' => 'Manager',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        // Worker
        DB::table('user_roles')->insert([
            'user_role' => 'Worker',
            'created_at' => '2019-01-30 12:00:00',
        ]);
    }
}
