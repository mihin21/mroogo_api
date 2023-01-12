<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Célibaterium', 'Cours unique', 'Villa', 'Studio'];
        foreach ($types as $type) {
            Type::create([
                'type_name' => $type,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
