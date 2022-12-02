<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ImportCoupon;

class ImportCouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[1,'2022-09-10'], [1,'2022-10-10'], [4,'2022-11-11'], [3,'2022-11-12'], [2,'2022-11-15']];

        foreach($data as $e){
            ImportCoupon::create([
                'supplier_id'=> $e[0],
                'time'=> $e[1],
            ]);
        }
    }
}
