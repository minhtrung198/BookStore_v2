<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    protected $fillable = ['name','parent_id'];
    protected $table = 'categories';
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
