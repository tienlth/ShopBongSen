<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Status;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Đã nhận', 'Đang giao', 'Đã giao'];

        foreach($data as $name){
            Status::create([
                'name'=> $name
            ]);
        }
    }
}
