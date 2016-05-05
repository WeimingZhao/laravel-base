<?php

namespace App\Models\Foundation;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'admin_roles';

    public $timestamps = false;

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function accesses()
    {
        return $this->belongsToMany('App\Models\Foundation\Access', 'admin_role_access', 'role_id', 'access_id');
    }

    public function users()
    {
        return $this->hasMany('App\Models\Foundation\User', 'role_id', 'id');
    }
}
