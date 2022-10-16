<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipment extends Model
{

    use SoftDeletes;
    
	protected $guarded = ['id', 'created_at', 'updated_at'];

    public function truck()
    {
    	return $this->belongsTo(Truck::class);
    }

    public function site()
    {
    	return $this->belongsTo(Site::class);
    }

    public function driver()
    {
    	return $this->hasOne(Driver::class);
    }

    public function company()
    {
    	return $this->hasOne(Company::class);
    }

    public function getRouteKeyName()
    {
        return 'uid';
    }

}
