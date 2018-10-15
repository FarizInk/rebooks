<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreTableSeeder extends Seeder
{
  protected $data = [
    [
          'name' => 'Romantika'
    ],
    [
          'name' => 'Humor'
    ],
    [
          'name' => 'Komik'
    ],
    [
          'name' => 'Horror'
    ],
    [
          'name' => 'Sejarah'
    ],
    [
          'name' => 'Sci-fi'
    ],
    [
          'name' => 'Dongeng'
    ],
    [
          'name' => 'Misteri'
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
        Genre::create($value);
      }
    }
}