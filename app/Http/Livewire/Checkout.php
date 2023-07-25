<?php
namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Checkout extends Component
{
    // public $snapToken;
    public function render()
    {
                // Set your Merchant Server Key
        \Midtrans\Config::$serverKey ='SB-Mid-server-oUMdpOByTGi9IlYOsMewj7Tq';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction =false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

    $params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 10000,
    ),
    'customer_details' => array(
        'first_name' => 'budi',
        'last_name' => 'pratama',
        'email' => 'budi.pra@example.com',
        'phone' => '08111222333',
    ),
);

    $snapToken = \Midtrans\Snap::getSnapToken($params);
   
    
        return view('livewire.checkout',compact('snapToken',));
    }
}
