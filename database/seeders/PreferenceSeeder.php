<?php

namespace Database\Seeders;

use App\Models\Preference;
use Illuminate\Database\Seeder;

class PreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preferences = ['Homme','Femme','Indifférent'];
        foreach ($preferences as $preference){
           Preference::create( [
                'sexe' => $preference,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
