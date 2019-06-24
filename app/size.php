<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $table="size";
    public function sanpham_size()
	{
		return $this->hasMany('App\sanpham_size','masize','masize');
	}
}
