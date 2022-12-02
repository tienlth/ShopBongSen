<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Problem;

class FeedbackProblemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Giao hàng', 'Sản phẩm', 'Chăm sóc khách hàng', 'Đóng gói', 'Giá'];
        foreach($data as $name){
            Problem::create([
                'name'=> $name
            ]);
        }
    }
}
