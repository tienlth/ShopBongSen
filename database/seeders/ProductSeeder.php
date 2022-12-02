<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::create([
        //     'name'=> 'Vẹn tròn1',
        //     'main_image'=> 'product1.png',
        //     'sale'=> 20,
        //     'price'=> 30,
        //     'width'=> 40,
        //     'height'=> 40,
        //     'color'=> 'Vàng, đỏ',
        //     'expiry'=> 5,
        //     'meaning'=> 'Hạnh phúc trọn vẹn đong đầy',
        //     'taking_care_guide'=> 'Tưới nước thường xuyên',
        //     'producttype_id'=>'2',
        //     'style_id'=>'3',
        //     'designed_by_customer'=> false,
        //     'quality'=>4
        // ]);

        // Product::create([
        //     'name'=> 'Vẹn tròn2',
        //     'main_image'=> 'product2.png',
        //     'sale'=> 20,
        //     'price'=> 30,
        //     'width'=> 40,
        //     'height'=> 30,
        //     'color'=> 'Vàng, đỏ',
        //     'expiry'=> 5,
        //     'meaning'=> 'Hạnh phúc trọn vẹn đong đầy',
        //     'taking_care_guide'=> 'Tưới nước thường xuyên',
        //     'producttype_id'=>'5',
        //     'style_id'=>'1',
        //     'designed_by_customer'=> false,
        //     'quality'=>5
        // ]);

        // Product::create([
        //     'name'=> 'Vẹn tròn3',
        //     'main_image'=> 'product3.png',
        //     'sale'=> 20,
        //     'price'=> 30,
        //     'width'=> 40,
        //     'height'=> 50,
        //     'color'=> 'Vàng, đỏ',
        //     'expiry'=> 5,
        //     'meaning'=> 'Hạnh phúc trọn vẹn đong đầy',
        //     'taking_care_guide'=> 'Tưới nước thường xuyên',
        //     'producttype_id'=>6,
        //     'style_id'=>3,
        //     'designed_by_customer'=> false,
        //     'quality'=>5
        // ]);

        // Product::create([
        //     'name'=> 'Tỏa Nắng1',
        //     'main_image'=> 'product4.png',
        //     'sale'=> 10,
        //     'price'=> 45,
        //     'width'=> 40,
        //     'height'=> 30,
        //     'color'=> 'Vàng, xanh',
        //     'expiry'=> 5,
        //     'meaning'=> 'Mang đến sức mạnh may mắn và niềm tin',
        //     'taking_care_guide'=> 'Tưới nước nhiều',
        //     'producttype_id'=>2,
        //     'style_id'=>3,
        //     'designed_by_customer'=> false,
        //     'quality'=>5
        // ]);

        // Product::create([
        //     'name'=> 'Vẹn tròn4',
        //     'main_image'=> 'product5.png',
        //     'sale'=> 20,
        //     'price'=> 30,
        //     'width'=> 40,
        //     'height'=> 60,
        //     'color'=> 'Vàng, đỏ',
        //     'expiry'=> 5,
        //     'meaning'=> 'Hạnh phúc trọn vẹn đong đầy',
        //     'taking_care_guide'=> 'Tưới nhiều nước',
        //     'producttype_id'=>1,
        //     'style_id'=>4,
        //     'designed_by_customer'=> false,
        //     'quality'=>3
        // ]);

        // Product::create([
        //     'name'=> 'Sắc Hồng1',
        //     'main_image'=> 'product6.png',
        //     'sale'=> 20,
        //     'price'=> 23,
        //     'width'=> 56,
        //     'height'=> 70,
        //     'color'=> 'Vàng, đỏ',
        //     'expiry'=> 5,
        //     'meaning'=> 'Món quà cho người thích màu hồng',
        //     'taking_care_guide'=> 'Không tưới nước',
        //     'producttype_id'=>2,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>2
        // ]);


        // Product::create([
        //     'name'=> 'Sắc Hồng2',
        //     'main_image'=> 'product7.png',
        //     'sale'=> 20,
        //     'price'=> 34,
        //     'width'=> 23,
        //     'height'=> 80,
        //     'color'=> 'Hồng, trắng',
        //     'expiry'=> 4,
        //     'meaning'=> 'Món quà cho người thích màu hồng',
        //     'taking_care_guide'=> 'Không tưới nước',
        //     'producttype_id'=>2,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>1
        // ]);
        
        // Product::create([
        //     'name'=> 'Sắc Hồng3',
        //     'main_image'=> 'product8.png',
        //     'sale'=> 20,
        //     'price'=> 56,
        //     'width'=> 78,
        //     'height'=> 50,
        //     'color'=> 'Hồng, xanh',
        //     'expiry'=> 3,
        //     'meaning'=> 'Món quà cho người thích màu hồng và màu xanh',
        //     'taking_care_guide'=> 'Tưới nước vừa đủ',
        //     'producttype_id'=>2,
        //     'style_id'=>2,
        //     'designed_by_customer'=> false,
        //     'quality'=>3
        // ]);

        // Product::create([
        //     'name'=> 'Chào buổi sáng1',
        //     'main_image'=> 'product9.png',
        //     'sale'=> 10,
        //     'price'=> 77,
        //     'width'=> 54,
        //     'height'=> 20,
        //     'color'=> 'Vàng, xanh',
        //     'expiry'=> 2,
        //     'meaning'=> 'Mang đến năng lượng cho buổi sáng',
        //     'taking_care_guide'=> 'Tưới nước ít',
        //     'producttype_id'=>5,
        //     'style_id'=>2,
        //     'designed_by_customer'=> false,
        //     'quality'=>4
        // ]);

        // Product::create([
        //     'name'=> 'Vẹn tròn5',
        //     'main_image'=> 'product10.png',
        //     'sale'=> 20,
        //     'price'=> 67,
        //     'width'=> 33,
        //     'height'=> 50,
        //     'color'=> 'Cam, đỏ',
        //     'expiry'=> 5,
        //     'meaning'=> 'Hạnh phúc đong đầy trọn vẹn',
        //     'taking_care_guide'=> 'Tưới nước nhiều',
        //     'producttype_id'=>5,
        //     'style_id'=>5,
        //     'designed_by_customer'=> false,
        //     'quality'=>2
        // ]);

        // Product::create([
        //     'name'=> 'Sắc Hồng6',
        //     'main_image'=> 'product11.png',
        //     'sale'=> 20,
        //     'price'=> 23,
        //     'width'=> 54,
        //     'height'=> 50,
        //     'color'=> 'Hồng, vàng',
        //     'expiry'=> 5,
        //     'meaning'=> 'Món quà cho người thích màu hồng và màu vàng',
        //     'taking_care_guide'=> 'Không tưới nước',
        //     'producttype_id'=>4,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>4
        // ]);


        // Product::create([
        //     'name'=> 'Trong xanh1',
        //     'main_image'=> 'product12.png',
        //     'sale'=> 20,
        //     'price'=> 34,
        //     'width'=> 23,
        //     'height'=> 60,
        //     'color'=> 'Xanh, trắng',
        //     'expiry'=> 4,
        //     'meaning'=> 'Mang năng lượng tươi tắn trong sáng',
        //     'taking_care_guide'=> 'Không tưới nước',
        //     'producttype_id'=>2,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>4
        // ]);
        
        // Product::create([
        //     'name'=> 'Trong xanh2',
        //     'main_image'=> 'product13.png',
        //     'sale'=> 28,
        //     'price'=> 45,
        //     'width'=> 23,
        //     'height'=> 70,
        //     'color'=> 'Xanh',
        //     'expiry'=> 3,
        //     'meaning'=> 'Món quà cho người thích màu xanh',
        //     'taking_care_guide'=> 'Tưới nước vừa đủ',
        //     'producttype_id'=>4,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>4
        // ]);

        // Product::create([
        //     'name'=> 'Trong xanh2',
        //     'main_image'=> 'product13.png',
        //     'sale'=> 28,
        //     'price'=> 45,
        //     'width'=> 23,
        //     'height'=> 70,
        //     'color'=> 'Xanh',
        //     'expiry'=> 3,
        //     'meaning'=> 'Món quà cho người thích màu xanh',
        //     'taking_care_guide'=> 'Tưới nước vừa đủ',
        //     'producttype_id'=>4,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>4
        // ]);

        // Product::create([
        //     'name'=> 'Trong xanh2',
        //     'main_image'=> 'product13.png',
        //     'sale'=> 28,
        //     'price'=> 45,
        //     'width'=> 23,
        //     'height'=> 70,
        //     'color'=> 'Xanh',
        //     'expiry'=> 3,
        //     'meaning'=> 'Món quà cho người thích màu xanh',
        //     'taking_care_guide'=> 'Tưới nước vừa đủ',
        //     'producttype_id'=>1,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>4
        // ]);

        // Product::create([
        //     'name'=> 'Trong xanh2',
        //     'main_image'=> 'product13.png',
        //     'sale'=> 28,
        //     'price'=> 45,
        //     'width'=> 23,
        //     'height'=> 70,
        //     'color'=> 'Xanh',
        //     'expiry'=> 3,
        //     'meaning'=> 'Món quà cho người thích màu xanh',
        //     'taking_care_guide'=> 'Tưới nước vừa đủ',
        //     'producttype_id'=>1,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>2
        // ]);

        // Product::create([
        //     'name'=> 'Trong xanh2',
        //     'main_image'=> 'product13.png',
        //     'sale'=> 28,
        //     'price'=> 45,
        //     'width'=> 23,
        //     'height'=> 70,
        //     'color'=> 'Xanh',
        //     'expiry'=> 3,
        //     'meaning'=> 'Món quà cho người thích màu xanh',
        //     'taking_care_guide'=> 'Tưới nước vừa đủ',
        //     'producttype_id'=>1,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>2
        // ]);
        
        // Product::create([
        //     'name'=> 'Trong xanh2',
        //     'main_image'=> 'product13.png',
        //     'sale'=> 28,
        //     'price'=> 45,
        //     'width'=> 23,
        //     'height'=> 70,
        //     'color'=> 'Xanh',
        //     'expiry'=> 3,
        //     'meaning'=> 'Món quà cho người thích màu xanh',
        //     'taking_care_guide'=> 'Tưới nước vừa đủ',
        //     'producttype_id'=>1,
        //     'style_id'=>1,
        //     'designed_by_customer'=> false,
        //     'quality'=>1
        // ]);
        
        
    }
}
