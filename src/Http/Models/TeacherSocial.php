<?php


namespace Tmss\School_website\Http\Models;


use Illuminate\Database\Eloquent\Model;

class TeacherSocial extends Model
{
    protected $table = 'teacher_socials';
    protected $fillable = [
        'title', 'details','colour'
    ];
}