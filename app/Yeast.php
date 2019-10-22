<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yeast extends Model
{
    protected $table = 'yeasts';
    protected $fillable = ['*'];
    public $timestamps = true;
    protected $casts = [
		'species_imgs' => 'array'
	];
}
