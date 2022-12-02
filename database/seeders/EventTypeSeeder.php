<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\EventType;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Sinh nhật', 'Kỷ niệm ngày cưới', 'Kỷ niệm ngày mới quen'];

        foreach($data as $name){
            EventType::create([
                'name'=> $name
            ]);
        }
    }
}
