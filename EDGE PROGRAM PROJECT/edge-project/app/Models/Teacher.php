<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'university_id'];  // Make sure 'university_id' is fillable

    /**
     * Get the university that the teacher belongs to.
     */
    // public function university()
    // {
    //     return $this->belongsTo(University::class);
    // }
//Teacher Model: In the Teacher model (assuming it's the User model for teachers), define the many-to-many relationship to the Course model
    // public function courses()
    // {
    //     return $this->belongsToMany(Course::class, 'course_teacher');
    // }
}
