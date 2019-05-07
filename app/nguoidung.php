<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    protected $table="nguoidung";
	public function khachhang()
	{
		return $this->hasMany('App\khachhang','manguoidung','manguoidung');
	}
	public function phanquyen()
	{
		return $this->hasMany('App\phanquyen','manguoidung','manguoidung');
	}
}
