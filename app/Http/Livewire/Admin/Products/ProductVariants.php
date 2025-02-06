<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Feature;
use App\Models\Option;
use Livewire\Component;

class ProductVariants extends Component
{

    public $openModal = true;

    public $options;

    public $variant = [
        'option_id' => '',
        'features' => [
            [
                'id' => '',
                'value' => '',
                'description' => ''
            ],
        ],
    ];

    public $product;

    public function mount(){
        $this->options = Option::all();
    }

    public function getFeaturesProperty(){
        return Feature::where('option_id', $this->variant['option_id'])->get();
    }

    public function addFeature()
    {
        $this->variant['features'][] = [
            'id' => '',
            'value' => '',
            'description' => ''
        ];
    }

    public function removeFeature($index){
        unset($this->variant['features'][$index]);
        $this->variant['features'] = array_values($this->variant['features']);
    }


    public function render()
    {
        return view('livewire.admin.products.product-variants');
    }
}
