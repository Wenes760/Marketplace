<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Province;
use app\City;
use Kavist\RajaOngkir\Facades\RajaOngkir;
class locationsTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach($daftarProvinsi as $provinceRow){
            DB::table('Provinces')->insert([
                'province_id'=>$provinceRow['province_id'],
                'title'=>$provinceRow['province']
            ]);
            $daftarKota = RajaOngkir::kota()->dariProvinsi($provinceRow['province_id'])-get();
            foreach($daftarKota as $cityRow){
                DB::table('cities')->insert
                ([
                    'province_id'=>$provinceRow['province_id'],
                    'city_id'=>$cityRow['city_id'],
                    'title'=>$cityRow['city_name']
                    ]);
        }
    }
}
}
