<?php

namespace Database\Seeders;

use App\Models\Caution;
use App\Models\CautionMonth;
use Illuminate\Database\Seeder;

class CautionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $months = [1, 2, 3, 4, 5, 6];
        foreach ($months as $month) {
            CautionMonth::create([
                'month' => $month,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
