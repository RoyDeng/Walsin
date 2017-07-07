<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Ps as PsEloquent;

class Ps extends Model
{
    protected $table = 'ps';

    public $timestamps = false;

	public function ps(){
		return $this->belongsTo(PsEloquent::class);
	}    
}