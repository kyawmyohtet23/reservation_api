<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cities = [
            ['name' => 'Yangon'],
            ['name' => 'Mandalay'],
            ['name' => 'Naypyitaw'],
            ['name' => 'Kalaw'],
            ['name' => 'Hpa-an'],
            ['name' => 'Taungyi'],
            ['name' => 'Pyin Oo Lwin'],
            ['name' => 'Mudon'],
            ['name' => 'Myeik'],
        ];


        foreach ($cities as $city) {
            City::create([
                'name' => $city['name']
            ]);
        }
    }
}
