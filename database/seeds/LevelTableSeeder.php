<?php

use Illuminate\Database\Seeder;
use App\Level;


class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['id_level' => 1, 'nama_level' => 'admin'],
        	['id_level' => 2, 'nama_level' => 'waiter'],
        	['id_level' => 3, 'nama_level' => 'kasir'],
            ['id_level' => 4, 'nama_level' => 'owner'],
        	['id_level' => 5, 'nama_level' => 'pembeli'],
        ];

        Level::insert($data);
    }
}
