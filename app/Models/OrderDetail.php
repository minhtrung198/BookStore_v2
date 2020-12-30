<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderDetail extends Model
{
    protected $fillable = ['quantity','price', 'discount','email','notes','phone'];
    protected $guarded = ['*'];
    protected $table = 'order_details';
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    public function orders()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
