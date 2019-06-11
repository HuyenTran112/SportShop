<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    protected $table="level";
	public function admin()
	{
		return $this->hasMany('App\admin','id','level');
	}
}
