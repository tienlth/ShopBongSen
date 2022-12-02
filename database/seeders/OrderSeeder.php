<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Order::create([
        //     'deliverytime'=>'2022-12-28',
        //     'customer_id'=>1,
        //     'status_id'=>2,
        //     'message'=>'abc',
        //     'note'=>'bc'
        // ])->products()->attach('1', ['quantity'=>3]);

        // Order::create([
        //     'deliverytime'=>'2022-12-01',
        //     'customer_id'=>2,
        //     'status_id'=>3,
        //     'message'=>'abc',
        //     'note'=>'bc'
        // ])->products()->attach('4', ['quantity'=>2]);

        // Order::find(2)->products()->attach('2', ['quantity'=>2]);

        // Order::create([
        //     'deliverytime'=>'2022-12-11',
        //     'customer_id'=>1,
        //     'status_id'=>3,
        //     'message'=>'abc',
        //     'note'=>'bc'
        // ])->products()->attach('1', ['quantity'=>3]);

        // Order::find(3)->products()->attach('2', ['quantity'=>3]);

        // Order::create([
        //     'deliverytime'=>'2022-11-29',
        //     'customer_id'=>2,
        //     'status_id'=>1,
        //     'message'=>'abc',
        //     'note'=>'bc'
        // ])->products()->attach('10', ['quantity'=>3]);

        // $orders = Order::all();
        // foreach($orders as $order){
        //     $customer = Customer::find($order->customer_id);
        //     $order->receiver_name = $customer->name;
        //     $order->receiver_phone = $customer->phone;
        //     $order->receiver_address = $customer->address;
        //     $order->save();
        // }
    }
}
