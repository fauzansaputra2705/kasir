<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	protected $primaryKey = 'id_level';
    protected $fillable =[
    	'id_level', 'nama_level',
    ];
    protected $table = 'levels';
}
