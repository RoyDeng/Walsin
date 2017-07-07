<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Po_item extends Model
{
    protected $table = 'po_item';

    public $timestamps = false;

	public function po(){
		return $this->belongsTo(Po::class,'p_id', 'p_id');
	}

	public function bo(){
		return $this->belongsTo(Bom_item::class,'b_id', 'b_id');
	}
}