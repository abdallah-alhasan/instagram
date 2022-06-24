<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;
        return view('profile.index' , compact('user' , 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update' , $user->profile);
        return view('profile.edit' , compact('user'));
    }

    public function update(User $user)
    {
        $imagePath = request('image')->store('profile' , 'public');

        $this->authorize('update' , $user->profile);
            $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'image' => '',
        ]);
        
        auth()->user()->profile->update(array_merge($data , ['image' => $imagePath]));
        return redirect("/profile/{$user->profile->user_id}");
    }

}
