<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //\App\Models\User::factory(10)->create();
         \App\Models\User::factory()->create([
            'name' => 'Quentin',
            'email' => 'admin@gmail.com',
            'password' => 'Qr931768463',
            'birthday' => '2000-10-20',
            'profile_picture' => 'profile_pictures/me.png',
            'role' => 'admin',
        ]);
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@ehb.be',
             'password' => 'Password!321',
             'birthday' => '2000-10-20',
             'profile_picture' => 'profile_pictures/admin.png',
             'role' => 'admin',
         ]);

         \App\Models\User::factory()->create([
            'name' => 'Gandalf The Gray',
            'email' => 'user@gmail.com',
            'password' => 'Qr931768463',
            'birthday' => '2000-10-20',
            'role' => 'user',
            'profile_picture' => 'profile_pictures/gandalf.png',
            'aboutme' => 'You shall not pass!'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Gandalf The White',
            'email' => 'user1@gmail.com',
            'password' => 'Qr931768463',
            'birthday' => '2000-10-20',
            'role' => 'user',
            'profile_picture' => 'profile_pictures/gandalfwhite.png',
            'aboutme' => 'A wizard is never late, nor is he early, he arrives precisely when he means to.'
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'Legolas',
            'email' => 'user2@gmail.com',
            'password' => 'Password!321',
            'birthday' => '2000-10-20',
            'role' => 'user',
            'profile_picture' => 'profile_pictures/legolas.png',
            'aboutme' => 'I\'ve only created this account because i lost my bow and need a new one...'
        ]);
         \App\Models\FAQCategory::create([
            'name' => 'Shipping'
        ]);
        \App\Models\FAQCategory::create([
            'name' => 'Payment'
        ]);
        $shippingCategory = \App\Models\FAQCategory::where('name', 'Shipping')->first();
        $paymentCategory = \App\Models\FAQCategory::where('name', 'Payment')->first();

        // Seed FAQ items
        \App\Models\FAQItem::create([
            'category_id' => $shippingCategory->id,
            'question' => 'Do you also ship your items oversea?',
            'answer' => 'Yes! but it might take a while.',
        ]);
        \App\Models\FAQItem::create([
            'category_id' => $shippingCategory->id,
            'question' => 'How long does shipping take for the same continent?',
            'answer' => 'Usually it takes about 4 days.',
        ]);
        \App\Models\FAQItem::create([
            'category_id' => $paymentCategory->id,
            'question' => 'Do you also accept trades?',
            'answer' => 'Yes, but the trade has to be fair.',
        ]);
        \App\Models\FAQItem::create([
            'category_id' => $paymentCategory->id,
            'question' => 'Can i go on a payment plan?',
            'answer' => 'No, if you can\'t afford the item, we won\'t sell it.',
        ]);
        // Health Potion
        \App\Models\Item::create([
            'name' => 'Health Potion',
            'description' => 'Restores health... Get stronger.',
            'price' => 5,
            'category' => 'Potion',
            'image' => 'storage/item_images/health_potion.jpg',
        ]);
        // Sword
        \App\Models\Item::create([
            'name' => 'Sword of Power',
            'description' => 'A long sword to compensate for other stuff.',
            'price' => 29.99,
            'category' => 'Sword',
            'image' => 'storage/item_images/sword.jpg',
        ]);
        // Helmet
        \App\Models\Item::create([
            'name' => 'Steel Helmet',
            'description' => 'A helmet to protect your empty head.',
            'price' => 19,
            'category' => 'Armor',
            'image' => 'storage/item_images/helmet.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Golden Ring',
            'description' => 'A golden ring, perfect for your mistress.',
            'price' => 99.99,
            'category' => 'Armor',
            'image' => 'storage/item_images/ring.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Wand',
            'description' => 'A magical staff, you\'re a wizard :username!',
            'price' => 39.99,
            'category' => 'Wand',
            'image' => 'storage/item_images/wand.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Healers Kit',
            'description' => 'Healers starter pack',
            'price' => 25,
            'category' => 'Adventure Kit',
            'image' => 'storage/item_images/Healers_kit.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Wizard hat',
            'description' => 'Merlin the great wizard\'s hat',
            'price' => 49,
            'category' => 'Armor',
            'image' => 'storage/item_images/wizard_hat.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Potion kit',
            'description' => 'Don\'t try drinking them all at the same time!',
            'price' => 25,
            'category' => 'Adventure Kit',
            'image' => 'storage/item_images/potion_kit.jpg',
        ]);
        \App\Models\Contact::create([
            'username' => 'Gandalf',
            'title' => 'Cancel order',
            'problem' => 'I\'ve ordered a Wand for my best friend Dumbledore, but he never came back from his dungeon :\'(',
            'response' => 'Don\'t worry i have cancelled your order, I hope your friend comes back.',
            'status' => 'resolved'
        ]);
        \App\Models\Contact::create([
            'username' => 'Gandalf',
            'title' => 'Wizard hat ripped!',
            'problem' => 'This is unacceptable, My wizard hat arrived a bit torn!!! It was pretty pricy, so i expect a new one!',
            'response' => '',
            'status' => 'pending'
        ]);
    }
}
