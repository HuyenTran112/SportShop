<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class phanquyen extends Model
{
    protected $table="phanquyen";
	public function nhomnguoidung()
	{
		return $this->hasMany('App\nhomnguoidung','manhomnguoidung','manhomnguoidung');
	}
	public function quyen()
	{
		return $this->belongsTo('App\quyen','maquyen','maquyen');
	}

}
