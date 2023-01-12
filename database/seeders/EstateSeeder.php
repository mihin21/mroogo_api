<?php

namespace Database\Seeders;

use App\Models\Estate;
use Illuminate\Database\Seeder;

class EstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estates = ['Terrain','Bureau','Maison','Immeuble'];
        foreach ($estates as $estate){
            Estate::create([
                'estate_name' => $estate,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
