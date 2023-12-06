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
    public function updateFaqCategory(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
    
        $faqCategory = FAQCategory::find($id);
    
        if ($faqCategory) {
            $faqCategory->update([
                'name' => $request->input('name')
            ]);
    
            $categories = FAQCategory::all();
            return view('faq.edit_faq', compact('categories'));
        }
    
        // Handle the case where the FAQ category is not found
        return redirect()->route('faq.edit_faq')->with('error', 'FAQ category not found.');
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
    public function deleteFaqItem($id){
        $faqItem = FAQItem::find($id);

        if ($faqItem) {
            $faqItem->delete();
            $categories = FAQCategory::all();
            return view('faq.edit_faq', compact('categories'));
        }
    }
    public function addFaqItem(Request $request, $category_id){
        $request->validate([
            'new_question' => 'required|string|max:255',
            'new_answer' => 'required|string',
        ]);

        FAQItem::create([
            'category_id' => $category_id,
            'question' => $request->input('new_question'),
            'answer' => $request->input('new_answer'),
        ]);
        $categories = FAQCategory::all();
        return redirect()->route('faq.edit_faq')->with('success', 'FAQ item added successfully');
    }
}
