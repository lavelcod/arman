<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'title' => 'Slider 1',
            'image' => 'sliders/B5pGyqED41J3m7lxjwaSla6vpl3DNM2ab9KKXxJg.jpg',
        ]);

        Slider::create([
            'title' => 'Slider 2',
            'image' => 'sliders/B5pGyqED41J3m7lxjwaSla6vpl3DNM2ab9KKXxJg.jpg',
        ]);
    }
}
