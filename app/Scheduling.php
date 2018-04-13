<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    protected $table = 'schedulings';
    protected $primaryKey = 'id';
    protected $fillable = ['doctor_id','patient_id','date','canceled','confirmed'];


    public function doctor()
    {
        return $this->belongsTo('App\Doctor');        
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
