<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    protected $fillable = ['name'];

    public function faqItems()
    {
        return $this->hasMany(FAQItem::class, 'category_id');
    }
}
