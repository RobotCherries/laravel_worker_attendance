<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRolesTableSeeder::class);
        $this->call(ClockingTypesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(FunctionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
