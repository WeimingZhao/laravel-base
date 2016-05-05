<?php

namespace App\Models\Foundation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $table = 'admin_users';

    protected $hidden = ['password', 'deleted_at', 'updated_at', 'created_at'];

    protected $guarded = ['id'];

    /**
     * Hash加密密码
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Models\Foundation\Role', 'id', 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loginLogs()
    {
        return $this->hasMany('App\Models\Foundation\UserLog', 'id', 'user_id');
    }

}
