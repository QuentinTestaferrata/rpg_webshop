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
    {//\App\Models\User::factory(10)->create();
         
/////////
//USERS//
/////////

         \App\Models\User::factory()->create([
            'name' => 'Quentin',
            'email' => 'admin@gmail.com',
            'password' => 'Qr931768463',
            'birthday' => '2000-10-10',
            'profile_picture' => 'profile_pictures/me.png',
            'role' => 'admin',
        ]);
         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@ehb.be',
             'password' => 'Password!321',
             'birthday' => '2000-10-10',
             'profile_picture' => 'profile_pictures/admin.png',
             'role' => 'admin',
         ]);

         \App\Models\User::factory()->create([
            'name' => 'Gandalf The Gray',
            'email' => 'user@gmail.com',
            'password' => 'Qr931768463',
            'birthday' => '2000-10-10',
            'role' => 'user',
            'profile_picture' => 'profile_pictures/gandalf.png',
            'aboutme' => 'You shall not pass!'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Gandalf The White',
            'email' => 'user1@gmail.com',
            'password' => 'Qr931768463',
            'birthday' => '2000-10-10',
            'role' => 'user',
            'profile_picture' => 'profile_pictures/gandalfwhite.png',
            'aboutme' => 'A wizard is never late, nor is he early, he arrives precisely when he means to.'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Legolas',
            'email' => 'user2@gmail.com',
            'password' => 'Password!321',
            'birthday' => '2000-10-10',
            'role' => 'user',
            'profile_picture' => 'profile_pictures/legolas.png',
            'aboutme' => 'I\'ve only created this account because i lost my bow and need a new one...'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'The Lich King',
            'email' => 'user3@gmail.com',
            'password' => 'Password!321',
            'birthday' => '2000-10-10',
            'role' => 'user',
            'profile_picture' => 'profile_pictures/lichking.png',
            'aboutme' => 'Frostmourne hungers.'
        ]);
        
//////////////////
//FAQ CATEGORIES//
//////////////////

         \App\Models\FAQCategory::create([
            'name' => 'Shipping'
        ]);
        \App\Models\FAQCategory::create([
            'name' => 'Payment'
        ]);
        $shippingCategory = \App\Models\FAQCategory::where('name', 'Shipping')->first();
        $paymentCategory = \App\Models\FAQCategory::where('name', 'Payment')->first();

/////////////
//FAQ items//
/////////////

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

//////////////
//SHOP ITEMS//
//////////////

        \App\Models\Item::create([
            'name' => 'Health Potion',
            'description' => 'Restores health... Get stronger.',
            'price' => 5,
            'category' => 'Potion',
            'image' => 'storage/item_images/health_potion.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Mana potion',
            'description' => 'Refills your mana!',
            'price' => 5,
            'category' => 'Potion',
            'image' => 'storage/item_images/mana.jpg',
        ]);
        
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
            'price' => 99,
            'category' => 'Armor',
            'image' => 'storage/item_images/ring.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Enchanted Dice Set',
            'description' => 'Give them a roll, and see what happens',
            'price' => 75,
            'category' => 'Accessory',
            'image' => 'storage/item_images/enchanted_dice.jpg',
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
            'name' => 'Dragon Egg',
            'description' => 'Wait till it hatches!',
            'price' => 500,
            'category' => 'Pet',
            'image' => 'storage/item_images/dragon_egg.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Potion kit',
            'description' => 'Don\'t drink them all at the same time!',
            'price' => 25,
            'category' => 'Adventure Kit',
            'image' => 'storage/item_images/potion_kit.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Adventure Bag',
            'description' => 'This can hold tons of items!',
            'price' => 20,
            'category' => 'Utility',
            'image' => 'storage/item_images/bag.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Celestial Compass',
            'description' => 'Let it guide you!',
            'price' => 150,
            'category' => 'Accessory',
            'image' => 'storage/item_images/celestial_compass.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Crystal Ball',
            'description' => 'Mages will know how to use it.',
            'price' => 40,
            'category' => 'Accessory',
            'image' => 'storage/item_images/crystal_ball.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Dungeon Key',
            'description' => 'Be careful, it\'s dangerous in there',
            'price' => 60,
            'category' => 'Utility',
            'image' => 'storage/item_images/dungeon_key.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Sword of Power',
            'description' => 'A long sword to compensate for other stuff.',
            'price' => 29,
            'category' => 'Sword',
            'image' => 'storage/item_images/sword.jpg',
        ]);
        
        \App\Models\Item::create([
            'name' => 'Wand',
            'description' => 'A magical staff, you\'re a wizard :username!',
            'price' => 25,
            'category' => 'Wand',
            'image' => 'storage/item_images/wand.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Healing Amulet',
            'description' => 'Heals you overtime',
            'price' => 40,
            'category' => 'Accessory',
            'image' => 'storage/item_images/heal_amulet.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Obsidian Axe',
            'description' => 'This will never break!',
            'price' => 35,
            'category' => 'Axe',
            'image' => 'storage/item_images/obsidian_axe.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Basic Pickaxe',
            'description' => 'For mining, not fighting!',
            'price' => 15,
            'category' => 'Axe',
            'image' => 'storage/item_images/pickaxe.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Staff of Lightning and Fire',
            'description' => 'Don\'t swing it too hard!',
            'price' => 350,
            'category' => 'Staff',
            'image' => 'storage/item_images/staff_thunder_fire.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Stardust Vial',
            'description' => 'Very rare! use it wisely!',
            'price' => 999,
            'category' => 'Potion',
            'image' => 'storage/item_images/stardust_vial.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Vampire Shield',
            'description' => 'A shield made by vampire\'s!',
            'price' => 40,
            'category' => 'Armor',
            'image' => 'storage/item_images/vampire_shield.jpg',
        ]);
        \App\Models\Item::create([
            'name' => 'Staff of Life',
            'description' => 'Enhanced healing ability\'s',
            'price' => 60,
            'category' => 'Staff',
            'image' => 'storage/item_images/staff_of_life.jpg',
        ]);
    

///////////
//CONTACT//
///////////

        \App\Models\Contact::create([
            'username' => 'Gandalf The Gray',
            'title' => 'Cancel order',
            'problem' => 'I\'ve ordered a Wand for my best friend Dumbledore, but he never came back from his dungeon :\'(',
            'response' => 'Don\'t worry i have cancelled your order, I hope your friend comes back.',
            'status' => 'resolved'
        ]);
        \App\Models\Contact::create([
            'username' => 'Gandalf The Gray',
            'title' => 'Wizard hat ripped!',
            'problem' => 'This is unacceptable, My wizard hat arrived a bit torn!!! It was pretty pricy, so i expect a new one!',
            'response' => '',
            'status' => 'pending'
        ]);
        \App\Models\Contact::create([
            'username' => 'The Lich King',
            'title' => 'Reparation',
            'problem' => 'I\'ve hit my enemies too hard, now Frostmourne is fissured, can you please repair it?',
            'response' => 'No sorry! We do not repair broken items if they don\'t come from our shop.',
            'status' => 'resolved'
        ]);

/////////
//Quest//
/////////
        \App\Models\Quest::create([
            'name' => 'Kill the wolf',
            'description' => 'There is a huge wolf terrorizing a nearby village, bring me the head back and to collect your reward!',
            'reward' => 450,
            'duration' => 50,
            'status' => 'available'
        ]);
        \App\Models\Quest::create([
            'name' => 'Lost cat',
            'description' => 'An old woman has lost her cat, it has black and white fur, and lost an eye, find it to collect the reward!',
            'reward' => 10,
            'duration' => 1,
            'status' => 'available'
        ]);
        \App\Models\Quest::create([
            'name' => 'Potion brewer',
            'description' => 'We ran out of invisibility potion, bring us 10 potions and you shall receive a reward!',
            'reward' => 50,
            'duration' => 5,
            'status' => 'available'
        ]);
            \App\Models\Quest::create([
            'name' => 'Kill the Ender Dragon',
            'description' => 'Go to the end using an End Portal and slay the Ender Dragon! Bring back it\'s egg and you will receive a huge reward!',
            'reward' => 99000,
            'duration' => 1,
            'status' => 'accepted',
            'active_user_id' => 2
        ]);
    }
}
