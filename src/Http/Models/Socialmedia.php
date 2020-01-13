<?php

namespace Tmss\School_website\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Socialmedia extends Model
{
    protected $table = 'socialmedia';
    protected $fillable = [
        'title', 'details','icon'
    ];
}
