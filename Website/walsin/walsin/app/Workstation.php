<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workstation extends Model
{
    protected $table = 'workstation';
	
    public $timestamps = false;

	protected $primaryKey = 'w_id';

	protected $fillable = ['s_max_temp','s_min_temp'];
}