<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RFID extends Model
{
    protected $table = 'RFID';
    protected $fillable = [
        'uid',
        'nik'
    ];
    public function RFID_workers(){
        return $this->belongsToMany('App\Workers', 'id_rfid');
    }
}
