<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    protected $table="loaisanpham";
	public $timestamps=false;
	public function sanpham()
	{
		return $this->hasMany('App\sanpham','maloaisp','maloaisp');
	}
}
