<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate random past date using carbon
        $randomDate = Carbon::now()->subMinutes(rand(1, 99999));

        // Admins
        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '1',
            'department_id' => '1',
            'function_id' => '1',

            // Base info
            'first_name' => 'Maria',
            'last_name' => 'Kunze',
            'email' => 'ceo@admin.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);

        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '1',
            'department_id' => '1',
            'function_id' => '2',

            // Base info
            'first_name' => 'Moise',
            'last_name' => 'Maher',
            'email' => 'cto@admin.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);

        // Managers
        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '2',
            'department_id' => '2',
            'function_id' => '3',

            // Base info
            'first_name' => 'Daniel',
            'last_name' => 'Stoian',
            'email' => 'it@manager.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);

        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '3',
            'department_id' => '3',
            'function_id' => '4',

            // Base info
            'first_name' => 'Mircea',
            'last_name' => 'Voicu',
            'email' => 'mircea.voicu@manager.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);

        // Workers
        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '3',
            'department_id' => '3',
            'function_id' => '5',

            // Base info
            'first_name' => 'Radu',
            'last_name' => 'Dumitru',
            'email' => 'radu.dumitru@worker.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);

        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '3',
            'department_id' => '3',
            'function_id' => '6',

            // Base info
            'first_name' => 'Sorin',
            'middle_name' => 'Ioan',
            'last_name' => 'Florea',
            'email' => 'sorin.florea@worker.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);

        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '3',
            'department_id' => '3',
            'function_id' => '7',

            // Base info
            'first_name' => 'Dan',
            'last_name' => 'Lascu',
            'email' => 'dan.lascu@worker.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);

        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '3',
            'department_id' => '3',
            'function_id' => '7',

            // Base info
            'first_name' => 'Sorina',
            'middle_name' => 'Andreea',
            'last_name' => 'Soimu',
            'email' => 'andreea.soimu@worker.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);

        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '3',
            'department_id' => '4',
            'function_id' => '8',

            // Base info
            'first_name' => 'Mihaela',
            'last_name' => 'Ignea',
            'email' => 'mihaela.ignea@worker.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);

        DB::table('users')->insert([
            // Foreign Keys
            'user_role_id' => '3',
            'department_id' => '4',
            'function_id' => '9',

            // Base info
            'first_name' => 'Constantin',
            'middle_name' => 'Corneliu',
            'last_name' => 'Petrovici',
            'email' => 'constantin.petrovici@worker.com',
            'email_verified_at' => '2019-01-30 17:26:00',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            
            // Meta info
            'date_hired' => $randomDate,
            'active' => '1',
            'created_at' => '2019-01-30 10:20:50',
        ]);
    }
}
