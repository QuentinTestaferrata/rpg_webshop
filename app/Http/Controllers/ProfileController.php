<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth;


class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show', ['user' => $user]);
    }
    public function show_edit_profile(User $user){
        return view('profile.edit_profile', ['user' => $user]);
    }

    public function update(Request $request, User $user){
        
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'birthday' => 'nullable|date',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'aboutme' => 'nullable|string|max:500',
        ]);

        $user->update([
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'birthday' => $request->input('birthday'),
            'aboutme' => $request->input('aboutme'),
        ]);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $path = $file->store('profile_pictures', 'public');
            $user->update(['profile_picture' => $path]);
        }
        return redirect()->route('profile.show', ['user' => $user]);
    }

    public function makeAdmin(User $user){
        $user->update(['role' => 'admin']);
        return redirect()->back();
    }
    public function makeUser(User $user){
        $user->update(['role' => 'user']);
        return redirect()->back();
    }
    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('home');
    }
    public function deleteUserFromUserList(User $user)
    {
        $user->delete();
        return redirect()->route('search.all_users');
    }
}