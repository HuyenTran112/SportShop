<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    rotected $table="khachhang";
	public function hoadon()
	{
		return $this->hasMany('App\hoadon','makh','makh');
	}
}
