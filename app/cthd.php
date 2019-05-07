<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cthd extends Model
{
    protected $table="sanpham";
	public function loaisanpham()
	{
		return $this->belongsTo('App\loaisanpham','maloaisp','maloaisp');
	}
	public function cthd()
	{
		return $this->hasMany('App\cthd','masp','masp');
	}
}
