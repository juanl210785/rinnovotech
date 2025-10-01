<?php

namespace App\Http\Livewire\Shipping;

use App\Enums\TypeOfDocuments;
use App\Enums\TypeOfPhone;
use App\Models\Address;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class ShippingAddresses extends Component
{
    public $addresses;

    public $newAddress = false;

    public $createAddress = [
        'type' => '',
        'description' => '',
        'estado' => '',
        'reference' => '',
        'receiver' => 1,
        'receiver_info' => [],
        'default' => false,
    ];

    public function mount()
    {
        $this->addresses = Address::where('user_id', auth()->id())->get();
        $this->createAddress['receiver_info'] = [
            'name' => auth()->user()->name,
            'last_name' => auth()->user()->last_name,
            'document_type' => auth()->user()->document_type,
            'document_number' => auth()->user()->document_number,
            'phone_type' => auth()->user()->phone_type,
            'phone_number' => auth()->user()->phone_number,
        ];
    }

    public function saveAddress()
    {

        $validated = $this->validate([
            'createAddress.type' => 'required|in:1,2',
            'createAddress.description' => 'required|string',
            'createAddress.estado' => 'required|string',
            'createAddress.reference' => 'required|string',
            'createAddress.receiver' => 'required|in:1,2',
            'createAddress.receiver_info' => 'required|array',
            'createAddress.default' => 'required|boolean',
            'createAddress.receiver_info.name' => 'required|string',
            'createAddress.receiver_info.last_name' => 'required|string',
            'createAddress.receiver_info.document_type' => [
                'required',
                new Enum(TypeOfDocuments::class)
            ],
            'createAddress.receiver_info.document_number' => 'required|integer|digits_between:6,8',
            'createAddress.receiver_info.phone_type' => [
                'required',
                new Enum(TypeOfPhone::class)
            ],
            'createAddress.receiver_info.phone_number' => 'required|integer|digits:7',
        ], [
            'createAddress.receiver_info.document_number.digits_between' => 'El campo Cedula/RIF debe tener entre 6 y 8 dígitos numéricos.',
            'createAddress.receiver_info.phone_number.digits' => 'El campo Teléfono debe contener exactamente 7 dígitos numéricos.'
        ], [
            'createAddress.type' => 'Tipo de dirección',
            'createAddress.description' => 'Dirección',
            'createAddress.estado' => 'Estado',
            'createAddress.reference' => 'Referencia',
            'createAddress.receiver' => 'Receptor',
            'createAddress.receiver_info.name' => 'Nombre',
            'createAddress.receiver_info.last_name' => 'Apellido',
            'createAddress.receiver_info.document_type' => 'Tipo de documento',
            'createAddress.receiver_info.document_number' => 'Cedula/RIF',
            'createAddress.receiver_info.phone_type' => 'Operadora',
            'createAddress.receiver_info.phone_number' => 'Teléfono',
        ]);

        //dd($validated);

        if (auth()->user()->addresses->count() === 0) {
            $this->createAddress['default'] = true;
        }

        Address::create([
            'user_id' => auth()->id(),
            'type' => $this->createAddress['type'],
            'description' => $this->createAddress['description'],
            'estado' => $this->createAddress['estado'],
            'reference' => $this->createAddress['reference'],
            'receiver' => $this->createAddress['receiver'],
            'receiver_info' => $this->createAddress['receiver_info'],
            'default' => $this->createAddress['default'],
        ]);

        $this->reset();

         $this->addresses = Address::where('user_id', auth()->id())->get();
         $this->createAddress['receiver_info'] = [
            'name' => auth()->user()->name,
            'last_name' => auth()->user()->last_name,
            'document_type' => auth()->user()->document_type,
            'document_number' => auth()->user()->document_number,
            'phone_type' => auth()->user()->phone_type,
            'phone_number' => auth()->user()->phone_number,
        ];

        $this->newAddress = false;

        $this->dispatchBrowserEvent('showNotification', [
            'message' => '¡Datos agregados!',
            'clase' => 'fa-circle-check',
            'lucide' => 'text-primary',
            'title' => 'Éxito'
        ]);
    }

    public function render()
    {
        return view('livewire.shipping.shipping-addresses');
    }
}
