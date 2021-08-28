<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
   protected $table = 'galleries';

	function work(){
		return $this->belongsTo('App\Models\Work','filter');
	}
}
