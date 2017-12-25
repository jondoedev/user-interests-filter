<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model {
    protected $guarded = array();


    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}