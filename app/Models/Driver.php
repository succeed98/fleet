<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{

	use SoftDeletes;

	protected $guarded = ['id', 'created_at', 'updated_at'];

    public function trucks()
    {
    	return $this->belongsToMany(Truck::class, 'trucks_drivers');
    }
    
}
