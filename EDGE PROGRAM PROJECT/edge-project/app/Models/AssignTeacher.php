<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignTeacher extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'teacher_id'];

    // Relationship with Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
