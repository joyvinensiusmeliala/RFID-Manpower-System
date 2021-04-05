<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_users';
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany('App\User','role_id');
    }
    
}
