<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Style;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Giỏ hoa', 'Bó hoa', 'Bình hoa', 'Hộp hoa'];

        foreach($data as $name){
            Style::create([
                'name'=> $name
            ]);
        }
    }
}
