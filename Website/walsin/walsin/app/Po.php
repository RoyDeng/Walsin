<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Po as PoEloquent;

class Po extends Model
{
    protected $table = 'po';

    public $timestamps = false;

	public function po(){
		return $this->belongsTo(PoEloquent::class);
	}
}