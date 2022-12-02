<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Hoa cẩm chướng', 'Hoa bách hợp', 'Hoa đồng tiền', 'Hoa cát tường', 'Hoa hồng', 
        'Hoa bi', 'Hoa bất tử', 'Hoa cẩm tú cầu', 'Mẫu đơn', 'Lan hồ điệp', 'Hoa cúc', 'Hoa sen',
        'Hướng dương', 'Hoa thạch thảo', 'Hoa ly'];

        for($i=0; $i<count($data); $i++){
            Ingredient::create([
                'name'=> $data[$i],
                'image'=>'ingredient'.($i+1).'.png',
                'instock_id'=>($i+1)
            ]);
        }
    }
}
