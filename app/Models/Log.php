<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['name','stuId','loginIP','loginCounts','memo','type'];
}
