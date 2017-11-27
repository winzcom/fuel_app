<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = 'fuels';

    protected $fillable = ['name','rate','currency_id','quantity'];

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
    public function machine()
    {
        return $this->hasMany('App\Machine');
    }

    public function stock() {
        return $this->hasOne('App\Stock');
    }
}
