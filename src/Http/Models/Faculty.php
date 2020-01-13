<?php

namespace Tmss\School_website\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';
    protected $fillable = [
        'coursecode', 'overview','feature','scope','subject','labinfo'
    ];
}
