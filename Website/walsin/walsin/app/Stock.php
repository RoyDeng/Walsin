<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Stock as StockEloquent;

class Stock extends Model
{
    protected $table = 'stock';
	
    public $timestamps = false;
	
	public function stock_item(){
		return $this->belongsTo(Stock_item::class,'s_id','s_id');
	}
}