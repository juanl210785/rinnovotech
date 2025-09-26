<?php

namespace App\Http\Livewire\Shipping;

use App\Models\Address;
use Livewire\Component;

class ShippingAddresses extends Component
{
    public $addresses;

    public function mount(){
        $this->addresses = Address::where('user_id', auth()->id())->get();
    }
    public function render()
    {
        return view('livewire.shipping.shipping-addresses');
    }
}
