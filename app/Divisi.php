<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';
    protected $fillable = [
        'nama',
        'project_id'
    ];

    public function divisi_workers(){
        return $this->belongsToMany('App\Workers', 'divisi_id');
    }

    public function divisi(){
        return $this->belongsToMany('App\User','divisi_id');
    }
    
    public function divisi_project(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function divisi_project_realtion(){
        return $this->belongsTo('App\Project', 'project_id');
    }

    public function divisi_jabatan(){
        return $this->belongsTo('App\Jabatan', 'jabatan_id');
    }

}

