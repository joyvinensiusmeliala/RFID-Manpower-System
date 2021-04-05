<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    protected $table = 'gate';
    protected $fillable = [
        'gate',
        'project_id'
        ];

    public function project_gate(){
        return $this->belongsTo('App\Project', 'project_id');
    }
    public function gate_workers(){
        return $this->belongsToMany('App\Workers', 'gate_id');
    }
}
