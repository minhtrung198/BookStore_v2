<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable =['street', 'state', 'city', 'country', 'zip_code'];
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
