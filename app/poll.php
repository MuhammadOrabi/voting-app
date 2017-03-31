<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poll extends Model {
	public function user() {
		return $this->belongsTo('App/User');
	}
	public function options() {
		return $this->hasMany('App\option');
	}
}
