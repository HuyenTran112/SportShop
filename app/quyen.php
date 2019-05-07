<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quyen extends Model
{
    protected $table="quyen";
	public function phanquyen()
	{
		return $this->hasMany('App\phanquyen','maquyen','maquyen');
	}
}
