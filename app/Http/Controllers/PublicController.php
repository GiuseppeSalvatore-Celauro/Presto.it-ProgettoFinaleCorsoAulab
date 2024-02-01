<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $products = Product::orderBy('created_at', 'desc')->where('is_accepted', true)->take(6)->get();
        $totProducts = Product::all()->count();
        $totUsers = User::all()->count();
        return view('homepage', compact('products', 'totProducts', 'totUsers'));
    }
    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

}
