<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fueling extends Model
{
	protected $table = 'fueling';
    protected $guarded = ['id'];

    public function truck()
    {
    	return $this->belongsTo(Truck::class);
    }

    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

}
