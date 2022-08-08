<?php

namespace Database\Seeders;

use App\Models\SliderPeta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderPetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SliderPeta::create([
            'title' => 'slider bagian satu',
            'slug' => 'slider-bagian-satu',
            'desc' => 'ini adalah slider bagian satu',
            'img' => 'sliderbagian1.png',
        ]);

        SliderPeta::create([
            'title' => 'slider bagian dua',
            'slug' => 'slider-bagian-dua',
            'desc' => 'ini adalah slider bagian dua',
            'img' => 'sliderbagian2.png',
        ]);

        SliderPeta::create([
            'title' => 'slider bagian tiga',
            'slug' => 'slider-bagian-tiga',
            'desc' => 'ini adalah slider bagian tiga',
            'img' => 'sliderbagian3.png',
        ]);

        SliderPeta::create([
            'title' => 'slider bagian empat',
            'slug' => 'slider-bagian-empat',
            'desc' => 'ini adalah slider bagian empat',
            'img' => 'sliderbagian4.png',
        ]);
    }
}
