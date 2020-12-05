<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    protected $fillable = ['status'];
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
    

}
