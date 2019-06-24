<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mausac extends Model
{
    protected $table="mausac";
    public function sanpham_mausac()
	{
		return $this->hasMany('App\sanpham_mausac','mamau','mamau');
	}
}
