<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MachineReading extends Model
{
    protected $table = 'machine_readings';

    protected $fillable = ['machine_id','start_reading','start_reading_time','end_reading','end_reading_time'];

    public function machine()
    {
        return $this->belongsTo('App\Machine');
    }
}
