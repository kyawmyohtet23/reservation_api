<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\RestaurantCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'Burmese Cuisine'],
            ['name' => 'Thai'],
            ['name' => 'Western Food'],
            ['name' => 'Fast Food'],
            ['name' => 'Indian'],
            ['name' => 'Bar'],
            ['name' => 'Restaurant'],
        ];


        foreach ($categories as $category) {
            RestaurantCategory::create([
                'name' => $category['name'],
                'slug' => uniqid() . Str::slug($category['name']),
            ]);
        }
    }
}
