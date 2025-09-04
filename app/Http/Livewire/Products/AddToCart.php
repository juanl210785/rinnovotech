<?php

namespace App\Http\Livewire\Products;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCart extends Component
{

    public $product;
    public $qty = 1;

    public function addItem()
    {
        Cart::instance('shopping');
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'options' => [
                'image' => $this->product->image,
                'sku' => $this->product->sku,
                'features' => []                
            ]
        ]);

        if (auth()->check()) {
            Cart::store(auth()->id());
        }

        $this->emit('cartUpdated', Cart::count());
    }

    public function render()
    {
        return view('livewire.products.add-to-cart');
    }
}
