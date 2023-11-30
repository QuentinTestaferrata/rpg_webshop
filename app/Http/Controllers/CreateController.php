<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class CreateController extends Controller
{
    public function show()
    {
        return view('create_item');
    }

    public function store(Request $request)
    {
        $imageName = $request->file('image')->getClientOriginalName();
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $imagePath = $request->file('image')->store('item_images', 'public');


        Item::create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => 'storage/' . $imagePath,
        ]);
        return redirect('/home');
    }
}

