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
    public function addCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        FAQCategory::create([
            'name' => $request->input('category_name'),
        ]);
        
        $categories = FAQCategory::all();
        return view('faq.edit_faq', compact('categories'));
    }
    public function updateFaqItem(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faqItem = FAQItem::find($id);
        $faqItem->update([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
        ]);
        $categories = FAQCategory::all();
        return view('faq.edit_faq', compact('categories'));
    }
    public function deleteFaqItem($id)
{
    $faqItem = FAQItem::find($id);

    if ($faqItem) {
        $faqItem->delete();
        $categories = FAQCategory::all();
        return view('faq.edit_faq', compact('categories'));
    }
}
}
