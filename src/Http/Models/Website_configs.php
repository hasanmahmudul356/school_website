<?php

namespace Tmss\School_website\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Website_configs extends Model
{
    protected $table = 'website_configs';
    protected $fillable = [
        'logo','banner_image', 'address', 'contactperson', 'contactno', 'email', 'phone', 'web','google_map'
    ];
}
