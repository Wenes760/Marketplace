<?php

namespace App\Http\Controllers;
use Kavist\RajaOngkir\RajaOngkir;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Ongkircontroller extends Controller
{
    private $apiKey = '334ad13b4ddf3480ac9c50bcac02f794';
    public function reader()
    {
        // $rajaOngkir = new RajaOngkir($apiKey);
        // $daftarProvinsi = $rajaOngkir->provinsi()->all();
        dd($daftarProvinsi);
        return view ('cart');
    }


public function view()
    {
        $rajaOngkir = new RajaOngkir('334ad13b4ddf3480ac9c50bcac02f794');
        $daftarProvinsi = $rajaOngkir->provinsi()->all();

        $countries = $daftarProvinsi
            ->get();
        
        return view('dropdown', compact('countries'));
    }
}
