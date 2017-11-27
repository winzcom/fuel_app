<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $table = 'stock';

    protected $fillable = ['fuel_id','quantity'];
    
    public function fuel() {
        return $this->belongsTo('App\Fuel');
    }
}
