<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DbConfig extends Model
{
    protected $table = 'db_configs';

    public $timestamps = false;

    protected $guarded = ['id'];

}
