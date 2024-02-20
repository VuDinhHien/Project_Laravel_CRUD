<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Student extends Model
{
    public $timestamps = false;
    public $fillable = ['name' , 'gender' , 'birthday' , 'address', 'phone' , 'courseId' ];
    use HasFactory;

    function getCourseName(){
        $c = Course::where('id', $this->courseId)->first();
        return $c->courseName;
    }
}
