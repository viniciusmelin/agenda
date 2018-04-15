<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['id','name','label'];


    public $timestamps = false;
    public function roles()
    {
        return $this->belongsToMany('App\Roles');
    }

}
