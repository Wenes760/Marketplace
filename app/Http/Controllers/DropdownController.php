<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class DropdownController extends Controller
{
    public function index()
    {
        // Mengambil data provinsi dari API RajaOngkir
        $provincesResponse = Http::get('https://api.rajaongkir.com/starter/province', [
            'key' => '334ad13b4ddf3480ac9c50bcac02f794'
        ]);

        $provinces = $provincesResponse['rajaongkir']['results'];

        return view('cart/elements', compact('provinces'));
    }

    public function getCities($provinceId)
    {
        // Mengambil data kota berdasarkan ID provinsi dari API RajaOngkir
        $citiesResponse = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => '334ad13b4ddf3480ac9c50bcac02f794',
            'province' => $provinceId
        ]);

        $cities = $citiesResponse['rajaongkir']['results'];

        return response()->json($cities);
    }
}
