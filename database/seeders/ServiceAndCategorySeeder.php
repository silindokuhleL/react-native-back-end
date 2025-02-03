<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceAndCategorySeeder extends Seeder
{
    public function run(): void
    {
        // Create categories
        $categories = [
            ['name' => 'Hair Services', 'icon' => 'cut-outline'],
            ['name' => 'Nail Services', 'icon' => 'hand-left-outline'],
            ['name' => 'Massage & Spa', 'icon' => 'body-outline'],
            ['name' => 'Facial & Skin', 'icon' => 'water-outline'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create services
        $services = [
            // Hair Services
            [
                'category_id' => 1,
                'name' => 'Haircut',
                'description' => 'Professional styling',
                'price' => 450,
                'duration' => '45 min',
                'rating' => 4.8,
                'reviews' => 124,
                'comments' => 'Highly recommended!'
            ],
            [
                'category_id' => 1,
                'name' => 'Hair Color',
                'description' => 'Full color treatment',
                'price' => 850,
                'duration' => '2 hrs',
                'rating' => 4.7,
                'reviews' => 89,
                'comments' => 'Amazing results'
            ],
            [
                'category_id' => 1,
                'name' => 'Blow Dry',
                'description' => 'Style and volume',
                'price' => 300,
                'duration' => '30 min',
                'rating' => 4.6,
                'reviews' => 67,
                'comments' => 'Quick and perfect'
            ],
            [
                'category_id' => 1,
                'name' => 'Hair Treatment',
                'description' => 'Deep conditioning',
                'price' => 600,
                'duration' => '1 hr',
                'rating' => 4.9,
                'reviews' => 45,
                'comments' => 'Restored my hair!'
            ],
            // Nail Services
            [
                'category_id' => 2,
                'name' => 'Gel Nails',
                'description' => 'Long-lasting polish',
                'price' => 550,
                'duration' => '1 hr',
                'rating' => 4.9,
                'reviews' => 112,
                'comments' => 'Worth every cent'
            ],
            // Facial & Skin
            [
                'category_id' => 4,
                'name' => 'Deep Cleansing',
                'description' => 'Thorough skin treatment',
                'price' => 750,
                'duration' => '1.5 hrs',
                'rating' => 4.8,
                'reviews' => 94,
                'comments' => 'Amazing experience'
            ],
            // Massage & Spa
            [
                'category_id' => 3,
                'name' => 'Full Body Massage',
                'description' => 'Relaxing therapy',
                'price' => 950,
                'duration' => '90 min',
                'rating' => 4.9,
                'reviews' => 156,
                'comments' => 'Pure bliss!'
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
