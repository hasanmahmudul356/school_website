<?php


namespace Tmss\School_website\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    protected $table = 'slides';
    protected $fillable = [
        'title', 'details'
    ];
}