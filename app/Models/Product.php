<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['quantity','name', 'description','price','status','image'];
    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
    public function authors()
    {
        return $this->belongsTo('App\Models\Author');
    }
    public function pubishers()
    {
        return $this->belongsTo('App\Models\Publisher');
    }
    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
