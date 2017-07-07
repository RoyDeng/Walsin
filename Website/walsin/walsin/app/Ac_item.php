<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ac_item extends Model
{
    protected $table = 'ac_item';
	
    public $timestamps = false;
	
	public function ac(){
		return $this->belongsTo(Ac::class,'a_id','a_id');
	}

	public function item(){
		return $this->belongsTo(Item::class,'i_id','i_id');
	}
}




