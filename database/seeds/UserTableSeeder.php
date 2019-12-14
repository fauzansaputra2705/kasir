<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['id_user' => 1, 'username' => 'admin', 'password' => bcrypt('admin@123'), /*'email'=> 'admin@gmail.com',*/ 'nama_user' => 'Admin', 'id_level' => 1],

        	['id_user' => 2, 'username' => 'waiter', 'password' => bcrypt('waiter@123'), /*'email'=> 'waiter@gmail.com',*/ 'nama_user' => 'Waiter', 'id_level' => 2],

        	['id_user' => 3, 'username' => 'kasir', 'password' => bcrypt('kasir@123'), /*'email'=> 'kasir@gmail.com',*/ 'nama_user' => 'Kasir', 'id_level' => 3],

            ['id_user' => 4, 'username' => 'owner', 'password' => bcrypt('owner@123'), /*'email'=> 'owner@gmail.com',*/ 'nama_user' => 'Owner', 'id_level' => 4],

        	['id_user' => 5, 'username' => 'pembeli', 'password' => bcrypt('pembeli@123'), /*'email'=> 'owner@gmail.com',*/ 'nama_user' => 'Pembeli', 'id_level' => 5],
        ];

        User::insert($data);
    }
}
