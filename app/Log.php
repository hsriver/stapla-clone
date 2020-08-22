<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $guarded = [
        '_token',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
