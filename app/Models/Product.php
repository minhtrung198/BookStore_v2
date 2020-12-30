<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    protected $fillable = ['quantity','name', 'description','price','status','image','category_id','author_id','publisher_id'];
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
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
