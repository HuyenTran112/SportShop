<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    protected $table="hoadon";
	public function cthd()
	{
		return $this->hasMany('App\cthd','sohd','sohd');
	}
	public function khachhang()
	{
		return $this->belongsTo('App\khachhang','makh','makh');
	}
	public $timestamps = false;
}
