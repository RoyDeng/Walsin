<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mo_item extends Model
{
    protected $table = 'mo_item';
	
    public $timestamps = false;
	
	protected $primaryKey = 'mo_id';
	
	protected $fillable = ['m_id','i_id','id','w_id'];
	
	public function mo(){
		return $this->belongsTo(Mo::class,'m_id','m_id');
	}
}