<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class DeleteItemController extends Controller
{
    public function deleteItem($id)
    {
        $item = Item::find($id);

        if ($item) 
    {
            $item->delete();
            return redirect('/home')->with('success', 'Item deleted successfuly.');
        }
        return redirect('/home')->with('error', 'Item not found.');
    }
}
