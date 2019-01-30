<?php

use Illuminate\Database\Seeder;

class FunctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 - Directiune
        DB::table('functions')->insert([
            'department_id' => '1',
            'function_name' => 'CEO',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('functions')->insert([
            'department_id' => '1',
            'function_name' => 'CTO',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        // 2 - IT
        DB::table('functions')->insert([
            'department_id' => '2',
            'function_name' => 'Administrator retea calculatoare',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        //  3 - Depozit
        DB::table('functions')->insert([
            'department_id' => '3',
            'function_name' => 'Sef depozit',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('functions')->insert([
            'department_id' => '3',
            'function_name' => 'Manipulant marfa',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('functions')->insert([
            'department_id' => '3',
            'function_name' => 'Lucrator gestionar',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('functions')->insert([
            'department_id' => '3',
            'function_name' => 'Muncitor necalificat',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        // 4 - Magazin
        DB::table('functions')->insert([
            'department_id' => '4',
            'function_name' => 'Lucrator comercial',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('functions')->insert([
            'department_id' => '4',
            'function_name' => 'Manager magazin',
            'created_at' => '2019-01-30 12:00:00',
        ]);
    }
}
