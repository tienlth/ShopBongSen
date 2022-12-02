<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Producttype;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Hoa sinh nhật', 'Hoa khai trương', 'Hoa chúc mừng', 'Hoa xin lỗi', 'Hoa cưới',
                'Hoa tốt nghiệp', 'Hoa tình yêu', 'Hoa chia buồn'];

        foreach($data as $name){
            Producttype::create([
                'name'=> $name
            ]);
        }
    }
}
