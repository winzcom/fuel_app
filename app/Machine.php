<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table = 'machines';

    protected $fillable = ['name','code','fuel_id'];

    public function fuel()
    {
        return $this->belongsTo('App\Fuel');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function sellers()
    {
        return $this->belongsToMany('App\Seller');
    }
    public function reading()
    {
        return $this->hasMany('App\MachineReading');
    }
    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }
}
