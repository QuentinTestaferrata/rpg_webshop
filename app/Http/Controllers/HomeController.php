<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $items = Item::all();
        $user = auth()->user();

        $items->transform(function ($item) use ($user) {
            $item->description = str_replace(':username', $user->name, $item->description);
            return $item;
        });
        return view('home', compact('items'));
    }
    public function about(){

    }
}
