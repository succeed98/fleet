<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{

	protected $guarded = ['id', 'created_at', 'updated_at'];

    public function drivers()
    {
    	return $this->belongsToMany(Driver::class, 'trucks_drivers');
    }

    public function shipments()
    {
    	return $this->hasMany(Shipment::class)
                    ->orderBy('arrived_at', 'DESC');
    }

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    public function brand()
    {
        return $this->year . ', ' . $this->make . ' ' . $this->model . ' [' . $this->color . ']' . ' - ' . $this->truck_no;
    }

}
