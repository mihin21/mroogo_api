<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ['Ouagadougou','Bobo dioulasso','Koudougou','Ouayigouya'];
        foreach ($cities as $city){
           City::create( [
                'citie_name' => $city,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
