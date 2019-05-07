<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhomnguoidung extends Model
{
    protected $table="nhomnguoidung";
	public function nguoidung()
	{
		return $this->hasMany('App\nguoidung','manhomnguoidung','manhomnguoidung');
	}
	public function phanquyen()
	{
		return $this->hasManu('App\phanquyen','manhomnguoidung','manhomnguoidung');
	}
}
