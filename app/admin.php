<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table="admin";
	public function level()
	{
		return $this->belongsTo('App\level','level','id');
	}
}
