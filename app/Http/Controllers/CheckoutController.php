<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function index()
    {
        $access_token = $this->generateAccessToken();

        $session_token = $this->generateSessionToken($access_token);

        return view('checkout.index', compact('session_token'));
    }

    public function generateAccessToken()
    {

        $endpoint = config('services.niubiz.endpoint') . "/api.security/v1/security";
        $user = config('services.niubiz.user');
        $password = config('services.niubiz.password');
        $auth = base64_encode($user . ":" . $password);

        $proxy = 'http://proxy.cantv.com.ve:80';

        $response = Http::withOptions([
            'proxy' => $proxy,
            'verify' => false // Desactiva verificación SSL si el proxy interfiere
        ])->withHeaders([
            'Authorization' => 'Basic ' . $auth,
            'Content-Type' => 'application/json'
        ])->post($endpoint)->body();

        return $response;
    }

    public function generateSessionToken($access_token)
    {

        $merchant_id = config('services.niubiz.merchand_id');
        $endpoint = config('services.niubiz.endpoint') . "/api.ecommerce/v2/ecommerce/token/session/{$merchant_id}";

        $user_address = Auth::user()->load('addresses');
        $mainAddress = $user_address->addresses->firstWhere('default', true);
        $description = $mainAddress?->description;
        $estado = $mainAddress?->estado;

        $proxy = 'http://proxy.cantv.com.ve:80'; 

        $response = Http::withOptions([
            'proxy' => $proxy,
            'verify' => false // Desactiva verificación SSL si el proxy interfiere
        ])->withHeaders([
            'Authorization' => $access_token,
            'Content-Type' => 'application/json'
        ])->post($endpoint, [
            "channel" => "web",
            "amount" => Cart::instance('shopping')->subtotal(),
            "antifraud" => [
                "clientIp" => request()->ip(),
                "merchantDefineData" => [
                    "MDD4" => "integraciones@niubiz.com.pe",
                    "MDD32" => "JD1892639123",
                    "MDD75" => "Registrado",
                    "MDD77" => 458
                ],
                "dataMap" => [
                    "cardholderCity" => $estado,
                    "cardholderCountry" => "VE",
                    "cardholderAddress" => $description,
                    "cardholderPostalCode" => "12345",
                    "cardholderState" => "GU",
                    "cardholderPhoneNumber" => "987654321"
                ],
            ]
        ])->json();

        return $response['sessionKey'];
    }
}
