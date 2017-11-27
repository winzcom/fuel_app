<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $fillable = ['name','rate'];

    public function fuel()
    {
        return $this->hasMany('App\Fuel');
    }
    public function expense()
    {
        return $this->hasMany('App\Expense');
    }
    public function sell()
    {
        return $this->hasMany('App\Sell');
    }

}
