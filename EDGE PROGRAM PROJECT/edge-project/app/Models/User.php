<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'course_id',
        'university_id',  // Add university_id to fillable
        'teacher_type_id', // Add teacher_type_id to fillable
       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Define the relationship with the Course model.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
//in university table it is connected with that foreign key in own table
    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    /**
     * Define the relationship with the TeacherType model.
     */
    public function teacherType()
    {
        return $this->belongsTo(TeacherType::class, 'teacher_type_id');
    }
    // Add this relationship method in your User model
    public function assignedCourses()
    {
        return $this->belongsToMany(Course::class, 'assign_teachers', 'teacher_id', 'course_id');
    }
    // Only teachers should have schedules
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'teacher_id')->where('role', 'teacher');
    }
  

}
