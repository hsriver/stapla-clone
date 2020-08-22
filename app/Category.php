<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function material()
    {
        return $this->hasMany('App\Material');
    }
}
