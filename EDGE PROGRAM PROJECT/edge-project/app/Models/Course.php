<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }
    //The users() method will allow you to access all users (students) enrolled in a particular course.
    //Course Model: In the Course model, define the inverse of the relationship:
    // public function teachers()
    // {
    //     return $this->belongsToMany(Teacher::class, 'course_teacher');
    // }

    public function teachers()
    {
        return $this->belongsToMany(User::class,  'course_id', 'teacher_id');
    }
    // Relationship to Schedules
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    
    
    
}
