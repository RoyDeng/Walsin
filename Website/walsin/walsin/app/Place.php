<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Place as PlaceEloquent;

class Place extends Model
{
    protected $table = 'place';

    public $timestamps = false;

	public function place(){
		return $this->belongsTo(PlaceEloquent::class);
	}
}