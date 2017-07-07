<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Ps_Item as Ps_ItemEloquent;

class Ps_Item extends Model
{
    protected $table = 'ps_item';

	protected $primaryKey = 'pi_id';
	
    public $timestamps = false;
}