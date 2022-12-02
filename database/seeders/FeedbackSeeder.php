<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feedback;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feedback::create([
            'name'=>'Nguyễn Văn H',
            'phone'=>'02132434323',
            'email'=>'ABC@gmail.com',
            'content'=>'Shop giao hàng quá chậm',
            'problem_id'=>1,
        ]);

        Feedback::create([
            'name'=>'Nguyễn Văn G',
            'phone'=>'02837458473',
            'email'=>'BCDEF@gmail.com',
            'content'=>'Shop giao hàng quá nhanh',
            'problem_id'=>1,
        ]);

        Feedback::create([
            'name'=>'Nguyễn Văn R',
            'phone'=>'0132454322',
            'email'=>'CDEFSK@gmail.com',
            'content'=>'Đóng gói sản phẩm sơ sài',
            'problem_id'=>4,
        ]);

        Feedback::create([
            'name'=>'Nguyễn Văn J',
            'phone'=>'0938574738',
            'email'=>'ABC@gmail.com',
            'content'=>'Chăm sóc khách hàng chưa tốt',
            'problem_id'=>3,
        ]);
    }
}
