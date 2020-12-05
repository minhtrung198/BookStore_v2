<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }
    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher');
    }
    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
