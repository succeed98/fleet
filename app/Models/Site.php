<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function identifier()
    {
    	return ucfirst($this->name) . '[ ' . ucfirst($this->type) . ' ]';
    }
}
