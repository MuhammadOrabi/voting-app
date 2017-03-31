<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class option extends Model {
	public function poll() {
		return $this->belongsTo('App/poll');
	}
}
