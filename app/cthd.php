<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cthd extends Model
{
    protected $table="cthd";
	public function sanpham()
	{
		return $this->belongsTo('App\sanpham','masp','masp');
	}
	public function hoadon()
	{
		return $this->belongsTo('App\hoadon','sohd','sohd');
	}
	public $timestamps = false;
}
