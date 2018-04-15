<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permissions;

class Doctor extends Model
{
    protected $table = 'doctor';

    protected $fillable = ['name','active'];

    public $timestamps = false;
    
    public function schedulings()
    {
        return $this->hasMany('App\Scheduling');
    }

    public function user()
    {
        return $this->hasOne('App\User','doctor_id');
    }
}
