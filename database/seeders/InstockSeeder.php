<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Instock;

class InstockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [2332, 3423, 4566, 3466, 2873, 4859, 2233, 2344, 112, 123, 3335, 66, 345, 233, 455,];

        for($i=0; $i<count($data); $i++){
            Instock::create([
                'quantity'=> $data[$i]
            ]);
        }
    }
}
