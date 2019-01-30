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
        ]);

        DB::table('departments')->insert([
            'department_name' => 'IT',
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Depozit',
        ]);

        DB::table('departments')->insert([
            'department_name' => 'Magazin',
        ]);
    }
}
