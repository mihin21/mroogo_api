<?php

namespace Database\Seeders;

use App\Models\Sexe;
use Illuminate\Database\Seeder;

class SexeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sexes = ['Masculin', 'Féminin'];
        foreach ($sexes as $sexe) {
            Sexe::create([
                'label' => $sexe,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
