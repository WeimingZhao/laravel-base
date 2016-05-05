<?php

namespace App\Models\Foundation;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    public $table = 'admin_login_logs';

    public $timestamps = true;

    protected $guarded = ['id'];

}
