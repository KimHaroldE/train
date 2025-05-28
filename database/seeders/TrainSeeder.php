<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Train::create([
            'train_name' => 'Express Train',
            'departure' => 'City A',
            'arrival' => 'City B',
            
        ]);

        \App\Models\Train::create([
            'train_name' => 'Local Train',
            'departure' => 'City C',
            'arrival' => 'City D',
        ]);
        \App\Models\Train::create([
            'train_name' => 'High-Speed Train',
            'departure' => 'City E',
            'arrival' => 'City F',
        ]);
    }
}
