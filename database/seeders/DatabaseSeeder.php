<?php

namespace Database\Seeders;

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
        $this->call([
            RoleSeeder::class,
            CautionSeeder::class,
            CitySeeder::class,
            EstateSeeder::class,
            PreferenceSeeder::class,
            RemoveTypeSeeder::class,
            SalonSeeder::class,
            ServiceSeeder::class,
            TypeSeeder::class,
            SexeSeeder::class
        ]);
    }
}
