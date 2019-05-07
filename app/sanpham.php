<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $table="sanpham";
	public function cthd()
	{
		return $this->hasMany('App\cthd','masp','masp');
	}
	public function nhacungcap()
	{
		return $this->belongsTo('App\nhacungcap','manhacungcap','manhacungcap');
	}
	public function loaisanpham()
	{
		return $this->belongsTo('App\loaisanpham','maloaisp');
	}
}
