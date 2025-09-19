<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'document_type' => ['required'],
            'document_number' => ['required', 'integer', 'regex:/^\d{6,8}$/'],
            'phone_type' => ['required'],
            'phone_number' => ['required', 'integer', 'regex:/^\d{7}$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'document_number.regex' => 'El campo Cedula/RIF debe tener entre 6 y 8 dígitos numéricos.',
            'phone_number.regex' => 'El campo Teléfono debe contener exactamente 7 dígitos numéricos.'
        ],[
            'document_number' => 'Cedula/RIF',
            'phone_number' => 'Teléfono',
            'last_name' => 'Apellido'
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'document_type' => $request->document_type,
            'document_number' => $request->document_number,
            'phone_type' => $request->phone_type,
            'phone_number' => $request->phone_number,
            'gender' => 'male',
            'active' => 1,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
