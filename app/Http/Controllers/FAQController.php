<?php

namespace App\Http\Controllers;

use App\Models\FAQCategory;
use App\Models\FAQItem;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function faqView()
    {
        $categories = FAQCategory::with('faqItems')->get();
        return view('faq.faq', compact('categories'));    
    }
    public function editFaqView(){
        $categories = FAQCategory::with('faqItems')->get();
        return view('faq.edit_faq', compact('categories'));
    }
    public function deleteFAQCategory($id)
    {
        $category = FAQCategory::find($id);

        if ($category) {
            $category->faqItems()->delete();
            $category->delete();
            $categories = FAQCategory::all();
            return view('faq.edit_faq', compact('categories'));
        }
    }
}
