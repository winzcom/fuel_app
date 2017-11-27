<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = ['customer_id','machine_id','quantity','created_date','role_id','status','pay_date','paid_by','paid_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function machine()
    {
        return $this->belongsTo('App\Machine');
    }
}
