<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['content'];
    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
