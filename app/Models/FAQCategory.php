<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    protected $table = 'faq_categories';
    protected $fillable = ['name'];

    public function faqItems()
    {
        return $this->hasMany(FAQItem::class, 'category_id');
    }
}
