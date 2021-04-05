<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    protected $table = 'workers';
    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'email',
        'handphone',
        'keterangan',
        'foto',
        'tgl_bergabung',
        'tgl_keluar',
        'project_id',
        'jabatan_id',
        'divisi_id',
        'jenis_kelamin',
        'status',
        'id_rfid',
    ];

    public function project_workers(){
        return $this->belongsTo('App\Project', 'project_id');
    }
    public function divisi_workers(){
        return $this->belongsTo('App\Divisi', 'divisi_id');
    }

    public function jabatan_workers(){
        return $this->belongsTo('App\Jabatan', 'jabatan_id');
    }
    public function gate_workers(){
        return $this->belongsTo('App\Gate', 'gate_id');
    }
    public function RFID_workers(){
        return $this->belongsTo('App\RFID', 'id_rfid');
    }
}
