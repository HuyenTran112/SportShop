<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table="menu";
	public function loaimenu()
	{
		return $this->belongsTo('App\loaimenu','maloaimenu','maloaimenu');
	}
}
