<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $products = Product::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(3)->get();
        if ($user->profile()->exists() == true) {
            $profile = $user->profile->id;
            return view('profile.index', compact('user', 'products', 'profile'));
        }
        return view('profile.index', compact('user', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->update([
            'country' => $request->has('country') ? $request->country : $profile->country,
            'contacts' => $request->has('contact') ? $request->contact : $profile->contact,
            'bg_pic' => $request->has('bg_img') ? $request->bg_img->store('profileBg', 'public') : $profile->bg_pic,
            'profile_pic' => $request->has('profile_pic') ? $request->profile_pic->store('profilePic', 'public') : $profile->profile_pic,
        ]);
        $user = $profile->user->id;
        return redirect()->route('profile.index', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
