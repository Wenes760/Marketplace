<?php

namespace App\Http\Livewire;
use Kavist\RajaOngkir\RajaOngkir;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TambahOngkir extends Component
{
    private $apiKey ='334ad13b4ddf3480ac9c50bcac02f794';
    public $provinsi_id, $kota_id, $jasa,$Daftarprovinsi, $daftarkota;
    // public function mount($id)
    public function render()
    {
        $rajaOngkir = new RajaOngkir($this->apiKey);
        $Daftarprovinsi = $rajaOngkir->provinsi()->all();
        
        $this->provinsi_id=1;

        if($this->provinsi_id)
        {
                    $this->daftarkota = $rajaOngkir->kota()->dariProvinsi($this->provinsi_id)->get();
      
                }     
       
        
        return view('shop.elements');
    }
}
