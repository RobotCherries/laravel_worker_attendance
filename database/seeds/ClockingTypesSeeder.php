<?php

use Illuminate\Database\Seeder;

class ClockingTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clocking_types')->insert([
            'clocking_type_tag' => 'P',
            'clocking_type' => 'Prezent',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('clocking_types')->insert([
            'clocking_type_tag' => 'Co',
            'clocking_type' => 'Concediu de odihna',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('clocking_types')->insert([
            'clocking_type_tag' => 'Cm',
            'clocking_type' => 'Concediu medical',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('clocking_types')->insert([
            'clocking_type_tag' => 'M',
            'clocking_type' => 'Concediu de maternitate',
            'created_at' => '2019-01-30 12:00:00',
        ]);

        DB::table('clocking_types')->insert([
            'clocking_type_tag' => 'A',
            'clocking_type' => 'Absenta nemotivata',
            'created_at' => '2019-01-30 12:00:00',
        ]);
    }
}
