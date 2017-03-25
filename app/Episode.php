<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
	public $timestamps = false;
	protected $table = 'episodes';

	public function show()
    {
        return $this->belongsTo('App\Show');
    }
}
