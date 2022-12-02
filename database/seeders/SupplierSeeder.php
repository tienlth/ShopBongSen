<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use \App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['name'=>'Dalat Hasfarm ','address'=>'450 Nguyên Tử Lực, P.8, Đà Lạt, Lâm Đồng'],
        ['name'=>'DalatFlower ','address'=>'Ngã Ba Dốc Trời, Làng hoa Vạn Thành, Thành phố Đà Lạt'],
        ['name'=>'Winsyfarm ','address'=>'73/35 Nguyễn Hữu Cầu - Thái Phiên - Phường 12 Đà Lạt, Lâm Đồng'],
        ['name'=>'Đà Lạt xanh ','address'=>'33B Trần Khánh Dư, Phường 8, TP Đà Lạt']];

        for($i=0; $i<count($data); $i++){
            Supplier::create([
                'name'=> $data[$i]['name'],
                'address'=>$data[$i]['address']
            ]);
        }
    }
}
