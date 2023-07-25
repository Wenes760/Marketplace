<?php

namespace App\Http\Controllers;

use App\Models\cartt;
use App\Models\Product;
use App\Models\User;
use Kavist\RajaOngkir\RajaOngkir;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
class CartController extends Controller
{
    public function cart()
    {
     
        
        return view('shop.cart');
    }








    public function cartElements(Request $request)
    {
        $users = User::all();
        $product = Product::all();
        $carts   = cartt::where('user_id', Auth::id())
                                ->orderBy('id', 'DESC')->get();
        $i = 1;
        $title = array();
        $isi = [];
        $total = 0;
         $a='asd';
         $provinsi =4 ;
      
      
         

        foreach ($carts as $cart) {
            // $total += $cart->total;

            $isi = array(
                "mitra_id" => $cart->product->user_id,
                "title" => $cart->product->title,
                "jumlah" => $cart->jumlah,
                // "subtotal" => $cart->total
            );
            array_push($title, $isi);
        }
        return view('shop.elements.cart', compact( 'carts','title','total', 'i', 'isi', 'users', 'product' ));
    }

    
    // public function getStates(Request $request)
    // {
    //     // $states = \DB::table('states')
    //     $daftarkota = $rajaOngkir->kota()->dariProvinsi('country_id', $request->country_id)->get();
    //         // ->where('country_id', $request->country_id)
    //         // ->get();
        
    //     if (count($daftarkota) > 0) {
    //         return response()->json($daftarkota);
    //     }
    // }
    public function cartDelete($id)
    {
        $carts   = cartt::find($id);
        $carts->delete();
        return back();
    }
    
    public function addCart(Request $request, $id)
    {
        
        $filters         = cartt::where('product_id', $id)
                                ->where('user_id', Auth::id())
                                ->get();
        $sum = 0;
        $sumJumlah = array();
        $product            = Product::find($id);
     
        if (count($filters) > 0) {
            foreach ($filters as $filter) {
              
                $sum += $filter->jumlah;
                array_push($sumJumlah, $sum);
            }
            $cart               = Cartt::where('product_id', $id)->first();
            $cart->jumlah       = $sum + $request->jumlah;
            $cart->total        = $product->harga * ($sum + $request->jumlah);
            $cart->product_id   = $id;
            $cart->user_id      = Auth::id();
            $cart->update();
        }else {
            $product            = Product::find($id);
            $cart               = new cartt();
            $cart->jumlah       = $request->jumlah;
            $cart->total        = $product->harga * $cart->jumlah;
            $cart->product_id   = $id;
            $cart->user_id      = Auth::id();
            $cart->save();
        }
    }
    public function updateCart(Request $request, $id)
    {
        $cart   = cartt::find($id);
        $cart->jumlah   = $request->jumlah;
        $cart->total    = $cart->product->harga * $request->jumlah;
        $cart->update();
    }


    public function cartcheckout()
    {
        
       return view('livewire.ongkir');
    }
    public function sum()
    {
        $sum = cartt::where('user_id', Auth::id())->count();
        return view('shop.elements.countCart', compact('sum'));
    }

   

}
