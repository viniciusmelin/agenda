<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name','label'];

    public $timestamps = false;

    public function permission()
    {
        return $this->belongsToMany('App\Permission');
    }
}
