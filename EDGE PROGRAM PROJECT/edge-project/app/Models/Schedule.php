<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'teacher_id',
        'date',
        'start_time',
        'end_time',
        'room_number',
    ];

    // Relationship to Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Relationship to Teacher (User model)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
