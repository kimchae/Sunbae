<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
	public $timestamps = false;
	protected $table = 'shows';

	public function episodes()
    {
        return $this->hasMany('App\Episode');
    }
}
