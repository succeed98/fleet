<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function truck()
    {
    	return $this->belongsTo(Truck::class);
    }
}
