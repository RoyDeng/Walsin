<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Client as ClientEloquent;
use \App\Order_item as OrderItemEloquent;
use \App\Mo as MoEloquent;
use \App\Ps_item as PsItemEloquent;

class Order extends Model
{
    protected $table = 'order';

	public $incrementing = false;
	
	protected $primaryKey = 'o_id';
	
    public $timestamps = false;
	
	protected $fillable = ['o_id','o_status'];
	
	public function client(){
		return $this->belongsTo(ClientEloquent::class,'c_id','c_id');
	}
	
	public function order_item(){
		return $this->belongsTo(OrderItemEloquent::class,'o_id','o_id');
	}
	
	public function mo(){
		return $this->belongsTo(MoEloquent::class,'o_id','o_id');
	}
	
	public function ps_item(){
		return $this->belongsTo(PsItemEloquent::class,'o_id','o_id');
	}
}