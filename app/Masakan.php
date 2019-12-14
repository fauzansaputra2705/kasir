<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    protected $primaryKey = 'id_masakan';
    protected $table = 'masakans';


    protected $fillable = [
    	'id_masakan','nama_masakan', 'harga', 'status_masakan',
    ];

}
