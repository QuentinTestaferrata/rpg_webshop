<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class EditController extends Controller
{
    public function show($id)
    {
        $item = Item::find($id);
        return view('edit_item', compact('item'));
    }
}
