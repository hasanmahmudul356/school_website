<?php


namespace Tmss\School_website\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';
    protected $fillable = [
        'title', 'details','colour'
    ];
}