<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    protected $table="loaisanpham";
	public function sanpham()
	{
		return $this->hasMany('App\sanpham','maloaisp','maloaisp');
	}
}
