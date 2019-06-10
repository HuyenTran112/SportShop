<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    protected $table="khachhang";
	public function hoadon()
	{
		return $this->hasMany('App\hoadon','makh','makh');
	}

	public function nguoidung()
	{
		return $this->belongsTo('App\nguoidung', 'manguoidung', 'manguoidung');
	}
	public $timestamps = false;
}
