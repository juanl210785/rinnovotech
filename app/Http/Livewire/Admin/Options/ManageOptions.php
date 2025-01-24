<?php

namespace App\Http\Livewire\Admin\Options;

use App\Models\Option;
use Livewire\Component;

class ManageOptions extends Component
{

    public $options;
    public $openModal = true;
    public $newOption = [
        'name' => '',
        'type' => 2,
        'features' => [
            [
                'value' => '',
                'description' => '',
            ],
        ]
    ];

    public function mount()
    {
        $this->options = Option::with('features')->get();
    }

    public function addFeature()
    {
        $this->newOption['features'][] = [
            'value' => '',
            'description' => ''
        ];

        $this->emit('newOptionUpdated');
    }

    public function addOption(){

        //dd($this->newOption);
        $rules = [
            'newOption.name' => 'required',
            'newOption.type' => 'required|in:1,2',
            'newOption.features' => 'required|array|min:1',
        ];

        foreach ( $this->newOption['features'] as $index => $feature) {
            if ($this->newOption['type'] == 1) {
                $rules['newOption.features.'.$index.'.value'] = 'required';
            } else {
                //Color
                $rules['newOption.features.'.$index.'.value'] = 'required|regex:/^#[af0-9]{6}$/i';
            }
            
            $rules['newOption.features.'.$index.'.description'] = 'required|max:255';
        }

        $this->validate($rules);

        $option = Option::create([
            'name' => $this->newOption['name'],
            'type' => $this->newOption['type'],
        ]);

        foreach ($this->newOption['features'] as $feature) {
            $option->features()->create([
                'value' => $feature['value'],
                'description' => $feature['description'],
            ]);
        }

        $this->options = Option::with('features')->get();

        $this->reset('openModal', 'newOption');
        
        session()->flash('notification', [
            'clase' => 'text-success',
            'lucide' => 'check-circle',
            'title' => 'Éxito',
            'message' => '¡Producto ha sido creado!'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
