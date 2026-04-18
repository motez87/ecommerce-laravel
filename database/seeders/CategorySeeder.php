<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Smartphones',
            'Ordinateurs portables',
            'Tablettes',
            'Accessoires',
            'Audio & Casques',
            'TV & Home Cinéma',
            'Photo & Caméra',
            'Gaming'
        ];
        
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => "Découvrez notre sélection de $category"
            ]);
        }
    }
}