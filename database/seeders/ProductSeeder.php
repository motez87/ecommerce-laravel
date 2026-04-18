<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        
        $products = [
            [
                'title' => 'iPhone 15 Pro Max',
                'description' => '256 Go, écran 6.7", puce A17 Pro, appareil photo 48MP, batterie longue durée',
                'price' => 1479.99,
                'category' => 'Smartphones'
            ],
            [
                'title' => 'Samsung Galaxy S24 Ultra',
                'description' => '256 Go, écran 6.8", S Pen, appareil photo 200MP, IA intégrée',
                'price' => 1399.99,
                'category' => 'Smartphones'
            ],
            [
                'title' => 'MacBook Pro M3',
                'description' => '14 pouces, puce M3 Pro, 18 Go RAM, 512 Go SSD, 18h d\'autonomie',
                'price' => 1999.99,
                'category' => 'Ordinateurs portables'
            ],
            [
                'title' => 'Dell XPS 15',
                'description' => 'Intel Core i9, 32 Go RAM, 1 To SSD, RTX 4070, écran 4K OLED',
                'price' => 2499.99,
                'category' => 'Ordinateurs portables'
            ],
            [
                'title' => 'iPad Pro 12.9"',
                'description' => 'M2 chip, 256 Go, écran Liquid Retina XDR, compatible Apple Pencil',
                'price' => 1299.99,
                'category' => 'Tablettes'
            ],
            [
                'title' => 'AirPods Pro 2',
                'description' => 'Réduction active du bruit, audio spatial personnalisé, autonomie 30h',
                'price' => 279.99,
                'category' => 'Audio & Casques'
            ],
            [
                'title' => 'Sony WH-1000XM5',
                'description' => 'Casque sans fil à réduction de bruit, autonomie 30h, son haute résolution',
                'price' => 399.99,
                'category' => 'Audio & Casques'
            ],
            [
                'title' => 'Samsung QLED 4K 65"',
                'description' => 'Smart TV Neo QLED, Quantum HDR, 120Hz, assistant vocal intégré',
                'price' => 1499.99,
                'category' => 'TV & Home Cinéma'
            ],
            [
                'title' => 'PlayStation 5',
                'description' => 'Console nouvelle génération, 825 Go SSD, manette DualSense incluse',
                'price' => 549.99,
                'category' => 'Gaming'
            ],
            [
                'title' => 'Chargeur MagSafe',
                'description' => 'Chargeur sans fil rapide pour iPhone, 15W, compatible coques',
                'price' => 39.99,
                'category' => 'Accessoires'
            ]
        ];

        foreach ($products as $productData) {
            $category = Category::where('name', $productData['category'])->first();
            if ($category && $user) {
                Product::create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'title' => $productData['title'],
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'image' => null
                ]);
            }
        }
    }
}