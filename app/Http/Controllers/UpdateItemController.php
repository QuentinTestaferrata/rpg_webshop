<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class UpdateItemController extends Controller
{
    public function show($id)
    {
        $item = Item::find($id);
        return view('edit_item', ['item' => $item]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $item = Item::find($id);
        $item->name = $request->input('name');
        $item->category = $request->input('category');
        $item->price = $request->input('price');
        $item->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('item_images', 'public');
            $item->image = $imagePath;
        }

        $item->save();
        return redirect()->route('home');    }
}
