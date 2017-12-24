<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model {
    protected $guarded = array();

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function interest()
    {
        return $this->belongsTo('App\Models\Interest');
    }

}