<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class nguoidung extends Authenticatable //Model
{

    protected $table="nguoidung";
	public function khachhang()
	{
		return $this->hasMany('App\khachhang', 'manguoidung', 'manguoidung');
	}
	public function nhomnguoidung()
	{
		return $this->hasMany('App\nhomnguoidung', 'manhomnguoidung', 'manhomnguoidung');
	}

	protected $fillable = [
        'tendangnhap','matkhau', 'trangthai','manhomnguoidung'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'matkhau', 'remember_token',
    ];


    public function getAuthPassword()
    {
      return $this->matkhau;
    }
	
	public $timestamps = false;
}
