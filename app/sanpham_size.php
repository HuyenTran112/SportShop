<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham_size extends Model
{
    protected $table="sanpham_size";
	
	public function sanpham()
	{
		return $this->belongsTo('App\sanpham','masp','masp');
	}
	public function size()
	{
		return $this->belongsTo('App\size','masize', 'masize');
	}
}
