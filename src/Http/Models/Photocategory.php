<?php

namespace Tmss\School_website\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Photocategory extends Model
{
    protected $table = 'photocategory';
    protected $fillable = [
        'topic','details'
    ];
}
