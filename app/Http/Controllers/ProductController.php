<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->where('is_accepted', true)->paginate(9);
        return view('products.index', compact('products'));
    }

    public function searchProducts(Request $request){
        $products = Product::search($request->searched)->where('is_accepted', true)->paginate(9);
        return view('products.index', compact('products'));
    }
    public function categoryIndex(Category $category){
        return view('products.category-index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
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
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function luckywheel(){
        $productsAll = Product::where('is_accepted', true)->get();
        $array = [];

        foreach ($productsAll as $product) {
            $array[]= $product->id;
        }

       if ($array) {
        $maxValue = max($array);
        $minValue = min($array);

        $randValue = rand($maxValue, $minValue);

        $product = Product::find($randValue);

        if ($product) {
            return view('products.luckywheel', compact('product'));
        }

       }

       return redirect()->back();
    }

    public function personalProduct(User $user){
        $productsAll = $user->products;
        $products = $productsAll->where('is_accepted', true);
        return view('products.personal-product', compact('products'));
    }
}
