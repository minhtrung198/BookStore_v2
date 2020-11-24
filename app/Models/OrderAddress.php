<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable = ['email','notes', 'phone'];
    public function orders()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
