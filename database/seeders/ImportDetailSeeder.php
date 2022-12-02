<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Ingredient;
use App\Models\ImportCoupon;

class ImportDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['import_id'=>1,'ingre_id'=>2,'quantity'=>1000,'price'=>6000],
        ['import_id'=>1,'ingre_id'=>6,'quantity'=>2000,'price'=>5000],
        ['import_id'=>4,'ingre_id'=>4,'quantity'=>1300,'price'=>7000],
        ['import_id'=>2,'ingre_id'=>10,'quantity'=>1100,'price'=>8000],
        ['import_id'=>1,'ingre_id'=>1,'quantity'=>1100,'price'=>9000],
        ['import_id'=>4,'ingre_id'=>12,'quantity'=>1200,'price'=>10000],
        ['import_id'=>1,'ingre_id'=>9,'quantity'=>300,'price'=>3000],
        ['import_id'=>2,'ingre_id'=>4,'quantity'=>200,'price'=>4000],
        ['import_id'=>5,'ingre_id'=>4,'quantity'=>400,'price'=>2000],
        ['import_id'=>3,'ingre_id'=>8,'quantity'=>1400,'price'=>6000]];

        foreach($data as $e){
            ImportCoupon::find($e['import_id'])->ingredients()->attach($e['ingre_id'], 
                                        ['quantity'=>$e['quantity'], 'price'=>$e['price']]);
        }
    }
}
