<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Models\cartt;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Session\Session;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class Ongkir extends Component
{
   public $daftarProvinsi,$provinsi_id,$daftarkota,$kota_id,$nama_jasa,$nama_jasas,$cost,$totall;
   public $result=[];

    public function render()
    {
       //get Provinsi
        $this->daftarProvinsi = RajaOngkir::provinsi()->all();
        //get Kota
        if($this->provinsi_id){
            $this->daftarkota = RajaOngkir::kota()->dariProvinsi($this->provinsi_id)->get();
             };
        //get Biaya
       if($this->nama_jasa){

      $this->cost = RajaOngkir::ongkosKirim([
         'origin'        => 155,     // ID kota/kabupaten asal
         'destination'   => ($this->kota_id),      // ID kota/kabupaten tujuan
         'weight'        => ($this->totall),    // berat barang dalam gram
         'courier'       => ($this->nama_jasa),    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
      
    //    $this->nama_jasas =$cost[0]['name'];
        
    };


    $users = User::all();
    $product = Product::all();
    $carts   = cartt::where('user_id', Auth::id())
                            ->orderBy('id', 'DESC')->get();
    $i = 1;
    $title = array();
    $isi = [];
    $lokasi=array();
    $total=0;

    foreach ($carts as $cart) {
        // $total += $cart->total;

        $isi = array(
            "mitra_id" => $cart->product->user_id,
            "title" => $cart->product->title,
            "jumlah" => $cart->jumlah,
            "lokasi"=>$cart->product->lokasi *$cart->jumlah,
            );

            

        $this->totall = collect($carts)->sum(function ($cart) {
            return $cart->product->lokasi * $cart->jumlah;
        });
        array_push($title, $isi);
    }
       
        return view('livewire.ongkir',compact('carts','title','total', 'i', 'isi','lokasi', 'users', 'product',));
    }

    
    public function getongkir(){
        //vaidasi
        if(!$this->provinsi_id || $this->kota_id || $this->jasa);{
        return;
        }

        //mengambil data produk
    
         // foreach ($cost as $row){
         //     Console::info('$cost[$row]');
         // }

//mengambil biaya ongkir



    }



}





