<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
  protected $data = [
    [
        'name' => 'Nizar Alfarizi Akbar',
        'username' => 'farizink',
        'email' => 'nizaralfariziakbar10@gmail.com',
        'password' => 'fariz0710',
        'address' => 'Pesona Permata Gading 1 Blok B4',
        'phone' => '085102725497',
        'gender' => 'male',
        'city_id' => '45',
        'img' => 'fariz.png',
        'verified' => '1'
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
        User::create($value);
      }
    }
}