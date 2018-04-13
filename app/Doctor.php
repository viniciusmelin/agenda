<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctor';

    protected $primaryKey = 'id';
    protected $fillable = ['name','active','user_id'];


    public function schedulings()
    {
        return $this->hasMany('App\Scheduling');
    }
}
