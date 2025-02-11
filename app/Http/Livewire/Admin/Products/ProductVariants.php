<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Feature;
use App\Models\Option;
use Livewire\Component;

class ProductVariants extends Component
{

    public $openModal = false;

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

    public function updatedVariantOptionId(){
        $this->variant['features'] = 
        [
            [
                'id' => '',
                'value' => '',
                'description' => ''
            ]
        ];        
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

    public function feature_change($index){
        $feature = Feature::find($this->variant['features'][$index]['id']);

        if ($feature) {
            $this->variant['features'][$index]['value'] = $feature->value;
            $this->variant['features'][$index]['description'] = $feature->description;
        } else {
            $this->variant['features'][$index]['value'] = '';
            $this->variant['features'][$index]['description'] = '';
        }
        
    }

    public function removeFeature($index){
        unset($this->variant['features'][$index]);
        $this->variant['features'] = array_values($this->variant['features']);
    }

    public function save(){
        $this->validate([
            'variant.option_id' => 'required',
            'variant.features.*.id' => 'required',
            'variant.features.*.value' => 'required',
        ],[], [
            'variant.option_id' => 'Tipo',
            'variant.features.*.id' => 'Opción',
            'variant.features.*.value' => 'Valor'
        ]);

        $this->product->options()->attach($this->variant['option_id'], [
            'features' => $this->variant['features']
        ]);

        $this->reset('variant', 'openModal');

        $this->dispatchBrowserEvent('showNotification', [
            'message' => 'Variante ha sido creada!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);
    }


    public function render()
    {
        return view('livewire.admin.products.product-variants');
    }
}
