<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleryimage extends Model
{
   protected $table = 'galleries_photos';

	function gallery(){
		return $this->belongsTo('App\Models\Gallery', 'gallery_id');
	}
}
