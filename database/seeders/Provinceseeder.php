<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class Provinceseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => 'a7de2ed772ca4fc00eddad32d2544615',
        ])->get('https://api.rajaongkir.com/starter/province');


        foreach ($response['rajaongkir']['results'] as $province) {
            DB::table('provinces')->insert([
                'province_id' => $province['province_id'],
                'title'       => $province['province']
            ]);
        }
    }
}
