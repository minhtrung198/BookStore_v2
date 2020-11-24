<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['quantity','price', 'discount'];
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function orders()
    {
        return $this->belongsTo('App\Models\Order');
    }
}