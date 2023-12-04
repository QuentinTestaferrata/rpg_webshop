<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQItem;
use App\Models\FAQCategory;

class FAQItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve category IDs
        $shippingCategory = FAQCategory::where('name', 'Shipping')->first();
        $paymentCategory = FAQCategory::where('name', 'Payment')->first();

        // Seed FAQ items
        FAQItem::create([
            'category_id' => $shippingCategory->id,
            'question' => 'Do you also ship your items oversea?',
            'answer' => 'Yes! but it might take a while.',
        ]);
        FAQItem::create([
            'category_id' => $shippingCategory->id,
            'question' => 'How long does shipping take for the same continent?',
            'answer' => 'Usually it takes about 4 days.',
        ]);

        FAQItem::create([
            'category_id' => $paymentCategory->id,
            'question' => 'Do you also accept trades?',
            'answer' => 'Yes, but the trade has to be fair.',
        ]);
        FAQItem::create([
            'category_id' => $paymentCategory->id,
            'question' => 'Can i go on a payment plan?',
            'answer' => 'No, if you can\'t afford the item, we won\'t sell it.',
        ]);
    }
}
