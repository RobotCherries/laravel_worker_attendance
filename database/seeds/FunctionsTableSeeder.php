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
        ]);

        DB::table('functions')->insert([
            'department_id' => '1',
            'function_name' => 'CTO',
        ]);

        // 2 - IT
        DB::table('functions')->insert([
            'department_id' => '2',
            'function_name' => 'Administrator retea calculatoare',
        ]);

        //  3 - Depozit
        DB::table('functions')->insert([
            'department_id' => '3',
            'function_name' => 'Sef depozit',
        ]);

        DB::table('functions')->insert([
            'department_id' => '3',
            'function_name' => 'Manipulant marfa',
        ]);

        DB::table('functions')->insert([
            'department_id' => '3',
            'function_name' => 'Lucrator gestionar',
        ]);

        DB::table('functions')->insert([
            'department_id' => '3',
            'function_name' => 'Muncitor necalificat',
        ]);

        // 4 - Magazin
        DB::table('functions')->insert([
            'department_id' => '4',
            'function_name' => 'Lucrator comercial',
        ]);

        DB::table('functions')->insert([
            'department_id' => '4',
            'function_name' => 'Manager magazin',
        ]);
    }
}
