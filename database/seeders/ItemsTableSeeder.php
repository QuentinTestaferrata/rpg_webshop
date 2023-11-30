<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Health Potion
        Item::create([
            'name' => 'Health Potion',
            'description' => 'Restores health... Get stronger.',
            'price' => 5,
            'category' => 'Potion',
            'image' => 'storage/item_images/health_potion.jpg',
        ]);
        // Sword
        Item::create([
            'name' => 'Sword of Power',
            'description' => 'A long sword to compensate for other stuff.',
            'price' => 29.99,
            'category' => 'Sword',
            'image' => 'storage/item_images/sword.jpg',
        ]);
        // Helmet
        Item::create([
            'name' => 'Steel Helmet',
            'description' => 'A helmet to protect your empty head.',
            'price' => 19,
            'category' => 'Armor',
            'image' => 'storage/item_images/helmet.jpg',
        ]);
        Item::create([
            'name' => 'Golden Ring',
            'description' => 'A golden ring, perfect for your mistress.',
            'price' => 99.99,
            'category' => 'Armor',
            'image' => 'storage/item_images/ring.jpg',
        ]);
        Item::create([
            'name' => 'Wand',
            'description' => 'A magical staff, you\'re a wizard :username!',
            'price' => 39.99,
            'category' => 'Wand',
            'image' => 'storage/item_images/wand.jpg',
        ]);
        Item::create([
            'name' => 'Healers Kit',
            'description' => 'Healers starter pack',
            'price' => 25,
            'category' => 'Adventure Kit',
            'image' => 'storage/item_images/Healers_kit.jpg',
        ]);
    }
}
