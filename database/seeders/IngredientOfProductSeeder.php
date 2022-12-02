<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientOfProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     $data = [['product_id'=>1,'ingre_id'=>2,'quantity'=>3],
    //     ['product_id'=>1,'ingre_id'=>6,'quantity'=>5],
    //     ['product_id'=>5,'ingre_id'=>4,'quantity'=>4],
    //     ['product_id'=>2,'ingre_id'=>10,'quantity'=>6],
    //     ['product_id'=>6,'ingre_id'=>1,'quantity'=>2],
    //     ['product_id'=>4,'ingre_id'=>12,'quantity'=>3],
    //     ['product_id'=>7,'ingre_id'=>9,'quantity'=>4],
    //     ['product_id'=>9,'ingre_id'=>4,'quantity'=>1],
    //     ['product_id'=>10,'ingre_id'=>4,'quantity'=>2],
    //     ['product_id'=>11,'ingre_id'=>8,'quantity'=>2],
    //     ['product_id'=>12,'ingre_id'=>10,'quantity'=>6],
    //     ['product_id'=>5,'ingre_id'=>1,'quantity'=>2],
    //     ['product_id'=>5,'ingre_id'=>12,'quantity'=>3],
    //     ['product_id'=>2,'ingre_id'=>9,'quantity'=>4],
    //     ['product_id'=>5,'ingre_id'=>4,'quantity'=>1],
    //     ['product_id'=>6,'ingre_id'=>4,'quantity'=>2],
    //     ['product_id'=>7,'ingre_id'=>8,'quantity'=>2],
    //     ['product_id'=>8,'ingre_id'=>10,'quantity'=>6],
    //     ['product_id'=>9,'ingre_id'=>1,'quantity'=>2],
    //     ['product_id'=>2,'ingre_id'=>12,'quantity'=>3],
    // ];

    //     foreach($data as $e){
    //         Product::find($e['product_id'])->ingredients()->attach($e['ingre_id'], 
    //                                     ['quantity'=>$e['quantity']]);
    //     }
    }
}
