<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaimenu extends Model
{
    protected $table="loaimenu";
	public function menu()
	{
		return $this->hasMany('App\menu','maloaimenu','maloaimenu');
	}
}
