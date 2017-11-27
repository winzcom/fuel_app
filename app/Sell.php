<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $table = 'sells';

    protected $fillable = ['amount','sell_date'];

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
}
