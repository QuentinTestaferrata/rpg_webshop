<?php

namespace App\Http\Controllers;

use App\Models\FAQCategory;

use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function faqView()
    {
        $categories = FAQCategory::with('faqItems')->get();
        return view('faq', compact('categories'));    
    }
}
