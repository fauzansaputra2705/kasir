<?php

use Illuminate\Database\Seeder;
use App\Masakan;

class MasakanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [ 
            ['id_masakan' => 1, 'nama_masakan' => 'Soto Ayam', 'harga' => 10000, 'status_masakan' =>'ada'],
            ['id_masakan' => 2, 'nama_masakan' => 'Mie Ayam', 'harga' => 10000, 'status_masakan' =>'ada'],
            ['id_masakan' => 3, 'nama_masakan' => 'Seblak', 'harga' => 9000, 'status_masakan' =>'ada'],
            ['id_masakan' => 4, 'nama_masakan' => 'Gulai Kambing', 'harga' => 20000, 'status_masakan' =>'ada'],
            ['id_masakan' => 5, 'nama_masakan' => 'Ayam Goreng', 'harga' => 20000, 'status_masakan' =>'ada'],
            ['id_masakan' => 6, 'nama_masakan' => 'Sate Ayam', 'harga' => 17000, 'status_masakan' =>'ada'],
            ['id_masakan' => 7, 'nama_masakan' => 'Sate Kambing', 'harga' => 25000, 'status_masakan' =>'ada'],
            ['id_masakan' => 8, 'nama_masakan' => 'Mie Ayam Bakso', 'harga' => 12000, 'status_masakan' =>'ada'],
            ['id_masakan' => 9, 'nama_masakan' => 'Bakso', 'harga' => 10000, 'status_masakan' =>'ada'],
            ['id_masakan' => 10, 'nama_masakan' => 'Nasi Goreng', 'harga' => 10000, 'status_masakan' =>'ada'] 
        ];
        Masakan::insert($data);
    }
}
