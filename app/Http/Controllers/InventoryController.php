<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class InventoryController extends Controller
{
    public function showInventory(){
        $user = Auth::user();
        $items = $user->inventory()->with('item')->get(); 
        return view('inventory', compact('items'));
    }
}
