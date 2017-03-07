<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    //
	protected $table = 'crud';
	protected $primarykey = 'id';
	protected $fillable = ['judl','is'];
	public $timestamps = false;
}

