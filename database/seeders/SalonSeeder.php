<?php

namespace Database\Seeders;

use App\Models\Salon;
use Illuminate\Database\Seeder;

class SalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salons = ['Salon','Salon + Salle à manger','Entrer-coucher'];
        foreach ($salons as $salon){
            Salon::create([
                'salon_name' => $salon,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
