<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['name','email','address','phone','machine_id','quantity','role_id'];

    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
    public function machine()
    {
        return $this->belongsTo('App\Machine');
    }
}
