<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'department_name' => 'Directiune',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('departments')->insert([
            'department_name' => 'IT',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Depozit',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Magazin',
            'created_at' => '2019-01-30 12:00:00',
        ]);
    }
}
