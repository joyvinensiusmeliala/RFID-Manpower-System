<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = [
        'nama', 'divisi_id'
        ];

    public function jabatan(){
        return $this->belongsToMany('App\User','jabatan_id');
    }

    // public function jabatan_workers(){
    //     return $this->belongsToMany('App\Workers', 'divisi_id');
    // }

    // public function jabatan_divisi(){
    //     return $this->belongsToMany('App\Jabatan', 'divisi_id');
    // }
    public function jabatan_project(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function divisi_jabatan(){
        return $this->belongsTo('App\Divisi', 'divisi_id');
    }

}


