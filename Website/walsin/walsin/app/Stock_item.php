<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock_item extends Model
{
    protected $table = 'stock_item';
	
    public $timestamps = false;
	
	public function stock(){
		return $this->belongsTo(Stock::class,'s_id','s_id');
	}
	
	public function place_item(){
		return $this->belongsTo(Warehouse_item::class,'pa_id','pa_id');
	}
	
	public function order_item(){
		return $this->belongsTo(Order_item::class,'i_id','i_id');
	}
}


