<?php

namespace Tmss\School_website\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Photogallery extends Model
{
    protected $table = 'photogallery';
    protected $fillable = [
        'topic','photocategory','details'
    ];
}
