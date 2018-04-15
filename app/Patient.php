<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

    protected $fillable = ['name','date_birth','age','active'];

    public function scheduling()
    {
        return $this->hasMany('App\Scheduling');
    }
}
