<?php

namespace Database\Seeders;

use App\Models\RemoveType;
use Illuminate\Database\Seeder;

class RemoveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $removeTypes = ['Privé','Entreprise'];
        foreach ($removeTypes as $removeType){
            RemoveType::create([
                'removeType_name' => $removeType,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
