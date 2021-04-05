<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = [
        'nama', 'lokasi'
        ];

    public function project(){
        return $this->belongsToMany('App\User','project_id');
    }

    public function project_gate(){
        return $this->belongsToMany('App\Gate','project_id');
    }

    public function project_workers(){
        return $this->belongsToMany('App\Workers', 'project_id');
    }

    public function divisi_project(){
        return $this->belongsToMany('App\Divisi', 'project_id');
    }

    public function jabatan_project(){
        return $this->belongsToMany('App\Jabatan', 'jabatan_id');
    }
}
