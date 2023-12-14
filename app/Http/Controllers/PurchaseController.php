<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;


class PurchaseController extends Controller
{
    public function purchase($item_id)
    {
        $user = Auth::user();
        $item = Item::find($item_id);

        // check als de loggedin user genoeg balance heeft
        if ($user->balance >= $item->price) {
            $user->balance -= $item->price;
            $user->save();

            // Check als de item al in inventory zit
            $inventoryItem = $user->inventory()->where('item_id', $item->id)->first();

            if ($inventoryItem) {
                $inventoryItem->quantity += 1;
                $inventoryItem->save();
            } else {
                $user->inventory()->create([
                    'item_id' => $item->id,
                    'quantity' => 1,
                ]);
            }

            return redirect()->route('home')->with('success', 'Item purchased successfully!');
        } else {
            return redirect()->route('home')->with('error', 'Insufficient balance to purchase the item.');
        }
    }

}
