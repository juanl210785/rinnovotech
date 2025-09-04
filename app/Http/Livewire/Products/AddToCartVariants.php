<?php

namespace App\Http\Livewire\Products;

use App\Models\Feature;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCartVariants extends Component
{
    public $product;
    public $qty = 1;

    public $selectedFeatures = [];

    public function mount(){
        foreach ($this->product->options as $option) {
            $features = collect($option->pivot->features);

            $this->selectedFeatures[$option->id] = $features->first()['id'];
        }
    }

    public function getVariantProperty(){
        return $this->product->variants->filter(function($variant){
            return !array_diff($variant->features->pluck('id')->toArray(), $this->selectedFeatures);
        })->first();
    }

    public function addItem()
    {
        Cart::instance('shopping');
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'options' => [
                'image' => $this->variant->image,
                'sku' => $this->variant->sku,
                'features' => Feature::whereIn('id', $this->selectedFeatures)->pluck('description', 'id')->toArray()                
            ]
        ]);

        if (auth()->check()) {
            Cart::store(auth()->id());
        }

        $this->emit('cartUpdated', Cart::count());
    }

    public function render()
    {
        return view('livewire.products.add-to-cart-variants');
    }
}
