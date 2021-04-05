<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manhours extends Model
{
    protected $table = 'manhours';
    protected $fillable = [
        'id_karyawan',
        'rfid_tag_id',
        'gate_id',
        'start_time',
        'end_time',
        'rest_time',
        'man_hours',
        'status'
    ];
}
