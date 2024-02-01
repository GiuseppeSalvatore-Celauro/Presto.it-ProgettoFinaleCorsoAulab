<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDelete extends Component
{
    public $product_id;
    public function deleteProduct($id){
        Product::find($id)->delete();

        return redirect(route('product'));
    }
    public function render()
    {
        return view('livewire.product-delete');
    }
}
