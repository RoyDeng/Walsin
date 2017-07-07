<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mo extends Model
{
    protected $table = 'mo';
	
    public $timestamps = false;
	
	public function order(){
		return $this->belongsTo(Order::class,'o_id','o_id');
	}
	
	public function order_item(){
		return $this->belongsTo(Order_item::class,'o_id','o_id');
	}
	
	public function mo_item(){
		return $this->hasMany(Mo_item::class,'m_id','m_id');
	}
	
	public function ps(){
		return $this->belongsTo(Ps_item::class,'o_id','o_id');
	}
}