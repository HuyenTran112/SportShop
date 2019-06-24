<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham_mausac extends Model
{
    protected $table="sanpham_mausac";
	
	public function sanpham()
	{
		return $this->belongsTo('App\sanpham','masp','masp');
	}
	public function mausac()
	{
		return $this->belongsTo('App\mausac','mamau', 'mamau');
	}
}
