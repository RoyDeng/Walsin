<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Error_item as ItemEloquent;

class Error extends Model
{
    protected $table = 'error';

    public $timestamps = false;
}