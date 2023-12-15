<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;


class PurchaseController extends Controller
{
    public function purchase(Request $request, $item_id){
        $user = Auth::user();
        $item = Item::find($item_id);
        $quantity = (int)$request->input('quantity');
    //Balancecheck
        if ($user->balance >= $item->price * $quantity && $quantity > 0) {
            $user->balance -= $item->price * $quantity;
            $user->save();
    //inventoryCheck
            $inventoryItem = $user->inventory()->where('item_id', $item->id)->first();

            if ($inventoryItem) {
                $inventoryItem->quantity += $quantity;
                $inventoryItem->save();
            } else {
                $user->inventory()->create([
                    'item_id' => $item->id,
                    'quantity' => $quantity,
                ]);
            }
            return redirect()->route('home')->with('success', 'Item(s) purchased successfully!');
        } else {return redirect()->route('home')->with('error', 'Insufficient balance or invalid quantity to purchase the item.');}
    }
}
