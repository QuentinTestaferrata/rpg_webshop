<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function searchUsers(Request $request){
        $query = $request->input('query');

        //de ingegeven searchquery
        $users = User::where('name', 'like', $query . '%')->get();

        return view('search.search', ['users' => $users, 'query' => $query]);
    }
    public function showAllUsers(){
        $users = User::all();
        return view('search.all_users', compact('users'));
    }
}
