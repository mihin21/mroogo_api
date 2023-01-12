<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['sales','rental','removal','co_rental'];
        foreach ($services as $service){
            Service::create([
                'service_name' => $service,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
