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
        'type' => 1,
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

    public function render()
    {
        return view('livewire.admin.options.manage-options');
    }
}
