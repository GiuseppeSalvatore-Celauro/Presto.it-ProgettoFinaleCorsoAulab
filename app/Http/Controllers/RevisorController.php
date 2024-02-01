<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Mail\RevisorMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $productstoBeRewiewed = Product::where('is_accepted', NULL)->get();
        $productsAlreadyRewiewed = Product::where('is_accepted', true)->get();
        $productsDeleted = Product::where('is_accepted', false)->get();
        return view('revisor.index', compact('productstoBeRewiewed', 'productsAlreadyRewiewed', 'productsDeleted'));
    }

    // public function toBeRewiewed(){
    //     $products = Product::where('is_accepted', NULL)->get();
    //     return view('revisor.toBeRewiewed', compact('products'));
    // }

    // public function revised(){
    //     $products = Product::where('is_accepted', true)->get();
    //     $productsDeleted = Product::where('is_accepted', false)->get();
    //     return view('revisor.revised', compact('products', 'productsDeleted'));
    // }


    public function show(Product $product){
        return view('revisor.show', compact('product'));
    }
    public function reviewedshow(Product $product){
        return view('revisor.reviewedshow', compact('product'));
    }

    public function revisorAccept(Product $product){
        $product->setAccept(true);
        return redirect()->route('revisor.index')->with('message', 'Prodotto accettato con successo');
    }
    public function revisorDelete(Product $product){
        $product->setAccept(false);
        return redirect()->route('revisor.index')->with('message', 'Prodotto rifiutato con successo');
    }

    public function requestRevisor(){
        // dd('ciao');
        Mail::to('admin@mail.com')->send(new RevisorMail(Auth::user()));
        return redirect()->route('home')->with('conferma', 'la richiesta è stata inviata');
    }

    public function newRevisorAccepted(User $user){
        Artisan::call('AttoZetta:is_revisor', ['email'=>$user->email]);
        return redirect()->route('home');
    }

}
