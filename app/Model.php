<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
	//fillable - what's in [] will go through
	//guarded - what's in [] will NOT go through
    protected $guarded = [];
}