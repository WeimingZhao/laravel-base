<?php

namespace App\Models\Foundation;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $table = 'admin_access';

    public $timestamps = false;

    protected $guarded = ['id'];

}
