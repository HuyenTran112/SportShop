<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
    protected $table="loaitin";
	public function tintuc()
	{
		return $this->hasMany('App\tintuc','maloaitin','maloaitin');
	}
}
