<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use \App\Models\User;
use \App\Models\Admin;
use \App\Models\Staffs;
use \App\Models\Customer;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admins
        $account1 = User::create([
            'username' => 'adminaccount',
            'password' => Hash::make('adminaccount'),
        ]);
        $account1->admins()->save((new Admin()));

        //staffs
        $account2 = User::create([
            'username' => 'staffaccount1',
            'password' => Hash::make('staffaccount1'),
        ]);
        $staff = new Staffs();
        $staff->name = 'Nguyễn Văn B';
        $staff->avatar = 'staff1.png';
        $staff->email = 'B@gmail.com';
        $staff->phone = '0283385747';
        $staff->birthday = '1999-12-30';
        $staff->hometown = 'Cần Thơ';
        $staff->address = '3/2, Ninh Kiều, Cần Thơ';
        $staff->gender = true;
        $account2->staffs()->save($staff);

        //customer
        $account3 = User::create([
            'username' => 'customeraccount1',
            'password' => Hash::make('customeraccount1'),
        ]);
        $customer1 = new Customer();
        $customer1->name = 'Nguyễn Văn A';
        $account3->customers()->save($customer1);


        $account4 = User::create([
            'username' => 'customeraccount2',
            'password' => Hash::make('customeraccount2'),
        ]);
        
        $customer2 = new Customer();
        $customer2->name = 'Nguyễn Văn C';
        $account4->customers()->save($customer2);
    }
}
