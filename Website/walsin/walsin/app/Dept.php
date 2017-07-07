<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use \App\Dept as DeptEloquent;

class Dept extends Model
{
    protected $table = 'dept';
    public $timestamps = false;
	
	public function user(){
		return $this->hasMany(User::class,'d_id','d_id');
	}
}
