<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function permission()
    {
        return $this->belongsToMany('App\Permission');
    }
}
