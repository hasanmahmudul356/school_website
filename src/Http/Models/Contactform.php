<?php


namespace Tmss\School_website\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Contactform extends Model
{
    protected $table = 'contactform';
    protected $fillable = [
        'firstname','lastname','phone','subject','message'
    ];
}