<?php

use Illuminate\Database\Seeder;
use App\City;

class CityTableSeeder extends Seeder
{
  protected $data = [
    [
        'name' => 'Banda Aceh'
    ],
    [
        'name' => 'Langsa'
    ],
    [
        'name' => 'Lhokseumawe'
    ],
    [
        'name' => 'Meulaboh'
    ],
    [
        'name' => 'Sabang'
    ],
    [
        'name' => 'subulussalam'
    ],
    [
        'name' => 'Denpasar'
    ],
    [
        'name' => 'Pangkalpinang'
    ],
    [
        'name' => 'Cilegon'
    ],
    [
        'name' => 'Serang'
    ],
    [
        'name' => 'Tangerang Selatan'
    ],
    [
        'name' => 'Tangerang'
    ],
    [
        'name' => 'Bengkulu'
    ],
    [
        'name' => 'Gorontalo'
    ],
    [
        'name' => 'Jakarta Barat'
    ],
    [
        'name' => 'Jakarta Pusat'
    ],
    [
        'name' => 'Jakarta Selatan'
    ],
    [
        'name' => 'Jakarta Timur'
    ],
    [
        'name' => 'Jakarta Utara'
    ],
    [
        'name' => 'Jambi'
    ],
    [
        'name' => 'Bandung'
    ],
    [
        'name' => 'Bekasi'
    ],
    [
        'name' => 'Bogor'
    ],
    [
        'name' => 'Cimahi'
    ],
    [
        'name' => 'Cirebon'
    ],
    [
        'name' => 'Depok'
    ],
    [
        'name' => 'Sukabumi'
    ],
    [
        'name' => 'Tasikmalaya'
    ],
    [
        'name' => 'Banjar'
    ],
    [
        'name' => 'Magelang'
    ],
    [
        'name' => 'Pekalongan'
    ],
    [
        'name' => 'Purwokerto'
    ],
    [
        'name' => 'Salatiga'
    ],
    [
        'name' => 'Semarang'
    ],
    [
        'name' => 'Surakarta'
    ],
    [
        'name' => 'Tegal'
    ],
    [
        'name' => 'Batu'
    ],
    [
        'name' => 'Blitar'
    ],
    [
        'name' => 'Kediri'
    ],
    [
        'name' => 'Madiun'
    ],
    [
        'name' => 'Malang'
    ],
    [
        'name' => 'Mojokerto'
    ],
    [
        'name' => 'Pasuruan'
    ],
    [
        'name' => 'Probolinggo'
    ],
    [
        'name' => 'Surabaya'
    ],
    [
        'name' => 'Pontianak'
    ],
    [
        'name' => 'Singkawang'
    ],
    [
        'name' => 'Banjarbaru'
    ],
    [
        'name' => 'Banjarmasin'
    ],
    [
        'name' => 'Palangkaraya'
    ],
    [
        'name' => 'Balikpapan'
    ],
    [
        'name' => 'Bontang'
    ],
    [
        'name' => 'Samarinda'
    ],
    [
        'name' => 'Tarakan'
    ],
    [
        'name' => 'Batam'
    ],
    [
        'name' => 'Tanjungpinang'
    ],
    [
        'name' => 'Bandar Lampung'
    ],
    [
        'name' => 'Metro'
    ],
    [
        'name' => 'Ternate'
    ],
    [
        'name' => 'Kepulauan Tidore'
    ],
    [
        'name' => 'Ambon'
    ],
    [
        'name' => 'Tual'
    ],
    [
        'name' => 'Bima'
    ],
    [
        'name' => 'Mataram'
    ],
    [
        'name' => 'Kupang'
    ],
    [
        'name' => 'Sorong'
    ],
    [
        'name' => 'Jayapura'
    ],
    [
        'name' => 'Dumai'
    ],
    [
        'name' => 'Pekan Baru'
    ],
    [
        'name' => 'Makassar'
    ],
    [
        'name' => 'Palopo'
    ],
    [
        'name' => 'Parepare'
    ],
    [
        'name' => 'Palu'
    ],
    [
        'name' => 'Bau-Bau'
    ],
    [
        'name' => 'Kendari'
    ],
    [
        'name' => 'Bitung'
    ],
    [
        'name' => 'Kotamobagu'
    ],
    [
        'name' => 'Manado'
    ],
    [
        'name' => 'Tomohon'
    ],
    [
        'name' => 'Bukitting'
    ],
    [
        'name' => 'Padang'
    ],
    [
        'name' => 'Pariaman'
    ],
    [
        'name' => 'Payakumbuh'
    ],
    [
        'name' => 'Sawahlunto'
    ],
    [
        'name' => 'Solok'
    ],
    [
        'name' => 'Lubukklinggau'
    ],
    [
        'name' => 'Pagaralam'
    ],
    [
        'name' => 'Palembang'
    ],
    [
        'name' => 'Prabumulih'
    ],
    [
        'name' => 'Medan'
    ],
    [
        'name' => 'Padang'
    ],
    [
        'name' => 'Pematangsiantar'
    ],
    [
        'name' => 'Sibolga'
    ],
    [
        'name' => 'Tanjung Balai'
    ],
    [
        'name' => 'Tebingtinggi'
    ],
    [
        'name' => 'Yogyakarta'
    ]
  ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      foreach ($this->data as $value) {
        City::create($value);
      }
    }
}
