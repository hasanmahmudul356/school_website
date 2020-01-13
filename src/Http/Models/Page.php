<?php

namespace Tmss\School_website\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    protected $fillable = [
        'title', 'url', 'description','template','is_menu','position','parent'
    ];
}
