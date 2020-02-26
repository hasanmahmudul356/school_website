<?php


namespace Tmss\School_website\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';
    protected $fillable = [
        'title', 'relation','details'
    ];
}