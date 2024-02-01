<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class ProductEdit extends Component
{
    public $product;
    public $name;
    public $description;
    public $product_id;
    public $price;
    public $category_id;

    public function mount($product_id){
        $product=Product::find($product_id);
        $this->product=$product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price=$product->price;
        $this->category_id = $product->category_id;
    }
    public function productEdit(){

        $this->product->update(
            [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            ]
        );
        $this->product->category_id = $this->category_id;

        $this->product->setAccept(NULL);

        return redirect(route('home'));
    }
    public function render()
    {
        return view('livewire.product-edit');
    }
}
